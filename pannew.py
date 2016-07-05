#!/Python27/python
from PIL import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import json
import re
#import cv2, numpy
import csv
import difflib
import json
from collections import Counter
from pytesseract import image_to_string

cgitb.enable(display=0, logdir="logs/pannew")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"

l=[]
l1=[]
l2=[]
l3=[]
caps=[]
caps1=[]
names=[]
names1=[]
names2=[]
names_xl=[]
correct_names=[]
correct_names1=[]
correct_names2=[]
numbers=[]
wanted=[]
want=[]
dob=[]
def hasNumbers(inputString):
    return any(char.isdigit() for char in inputString)

def duplicates(l):
    seen = set()
    result = []
    for item in l:
        if item not in seen:
            seen.add(item)
            result.append(item)
    return result
def subtract_lists(a, b):
    multiset_difference = Counter(a) - Counter(b)
    result = []
    for i in a:
        if i in multiset_difference:
            result.append(i)
            multiset_difference -= Counter((i,))
    return result

def merge(x,y):
    z = x.copy()
    z.update(y)
    return z






#converting image to black and white
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
filename, file_extension = os.path.splitext(temp)
original = Image.open(filepath)
gray = original.convert('L')
bw = gray.point(lambda x: 0 if x<128 else 245, '1')
bw.save("temp_file/result.png")

#croping image
image=Image.open("temp_file/result.png")
w,h=image.size
e=w/2
f=int(.15*h)
g=int(.15*h)
image.crop((0,g,e,h-f)).save('temp_file/result_crop.png')

#reading text from image
temp="temp_file/result_crop.png"
img = Image.open(temp)
#print "Hello world"
img.load()
i = pytesseract.image_to_string(img)
#print i
j=i.split('\n')
#print j

#removing garbage
k=filter(lambda x: ord(x)<128,i)
#print k
final_list=k.split('\n')
#print final_list
str_list = filter(None, final_list)
#print str_list
#print l

with open('pan.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
       # if not names:
        names=difflib.get_close_matches(row['Names'],final_list)
        #print names
        names1=names1+names
#print names1


names2=duplicates(names1)
#print names2
with open('pan.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
        names_xl.append(row['Names'])
    #print names_xl

for letters in names2:
    correct_names=difflib.get_close_matches(letters,names_xl)
    correct_names1=correct_names1+correct_names


#print correct_names1

correct_names2=duplicates(correct_names1)
#print correct_names2

numbers=subtract_lists(final_list, names2)
for let in numbers:
    let1="".join(let.split())
    l=l+[let1]
    
for let in l:
    if(len(let)>5):
        if(len(let)<=11):
            #print let
            #print len(let)
            l1=l1+[let]
#print "l1"
#print  l1

for let in l1:
    if(re.match("[A-Z]{2}",let,flags=0)):
        caps=caps+[let]
#print "l2"
#print l2

pan=list(set(l1).intersection(caps))
#print "pan"
#print caps
dob=subtract_lists(l1,pan)

for let in dob:
    if(hasNumbers(let)):
        l3=l3+[let]
#print l3



dob1=list(set(dob).intersection(l3))
#print "dob"
#print caps1

head1=['Name','Fathername']
head2=['DOB']
head3=['PanNo']
dicti1=dict(zip(head1,correct_names2))
dicti2=dict(zip(head2,dob1))
dicti3=dict(zip(head3,pan))
dicti4=merge(dicti2,dicti1)
dicti5=merge(dicti3,dicti4)


string={"Name": correct_names2[0],"Father Name":correct_names2[1],"DOB":dob1[0],"PanNo":pan[0]}
print string
#converting to json
helo=json.dumps(dicti5)
#print helo


with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(string, fp)


print "</body></html>"




