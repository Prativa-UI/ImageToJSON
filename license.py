#!/Python27/python
from PIL import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import json
import difflib
import csv
import re
import cv2, numpy
from pytesseract import image_to_string

cgitb.enable(display=0, logdir="logs/license")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"

#image to black n white
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
filename, file_extension = os.path.splitext(temp)

col = Image.open(filepath)
gray = col.convert('L')
bw = gray.point(lambda x: 0 if x<128 else 255, '1')
bw.save("temp_file/result_bw.png")

#for driving licence number
#cropping licence number part
image=Image.open("temp_file/result_bw.png")


w,h=image.size
w2=w/2
w1=int(.1*w) #h and w are height and weight
h1=int(.1*h)
h2=int(.23*h)
image.crop((w1,h1,w2,h2)).save('temp_file/no_crop.png')
#fetch string from image
import pytesseract
temp="temp_file/no_crop.png"
img= Image.open(temp)

img.load()
text1 = pytesseract.image_to_string(img)
text1=filter(lambda x: ord(x)<128,text1)
print text1 #printing string
count=0
list_dl=list(text1) #list of string having licence number
#print list_dl 

while(count<len(list_dl)):
    if(list_dl[count]=='M'): #first finding M and then fetching next 16 characters
        #print count
        break
    count=count+1

count2=count+16
dl_no=text1[count:count2]
#print dl_no #driving licence number
#print "h"
dl_no1=dl_no.split()
#print dl_no1
dl_no2=[dl_no1[0]+dl_no1[1]]
#print dl_no2 #licence number in better format
#print "hello"
# for other details
#cropping a part of image where other information is present
w11=0
h11=int(.5*h)
w22=int(.6*w)
h22=int(0.9*h)
image.crop((w11,h11,w22,h22)).save('temp_file/otherdet_crop.png')

#import pytesseract
#converting cropped image into string
temp="temp_file/otherdet_crop.png"
img = Image.open(temp)
img.load()
text2 = pytesseract.image_to_string(img)
text2=filter(lambda x: ord(x)<128,text2)
#print text2 #printing string
#print "-----------------------------------------------------"


count=0
p=text2.split()#converting into list of strings
while(count<len(p)): #removing some special characters
    if(p[count]=="'"):
        p.remove("'")
        count=count-1
    if(p[count]=='.'):
        p.remove('.')
        count=count-1
    if(p[count]==".'"):
        p.remove(".'")
        count=count-1
    if(p[count]=="'."):
        p.remove("'.")
        count=count-1
    if(p[count]==' '):
        p.remove(' ')
        count=count-1
    if(p[count]==':'):
        p.remove(':')
        count=count-1
    
    count=count+1
#print p
#print len(p)

wor1=difflib.get_close_matches("DOB", p) #finding word having closer match to 'DOB'

#print "--------------"
#print wor1
#print len(wor1)
#print "---------------"

flag=0
count1=0
count2=0
ind=0
while(count1<len(wor1) and flag==0): #finding index of 'DOB' and then fetching next string that is birthdate
    #print "in while 1"
    while(count2<len(p) and flag==0):
        #print "in while 2"
        if(p[count2]==wor1[count1]):
                ind=count2
                print ind
                flag=1
        count2=count2+1
    count1=count1+1
#print ind
#for printing dob
#print p[ind]
#print p[ind+1]

dob=p[ind+1]
#print dob 
dob1=dob.split() #converting to a list
#print dob1
#print "--------------------------------------------------"
count=0 
line=text2.split('\n') #taking initial  complete string from cropped image 2 and splitting on d basis of lines 
while(count<len(line)):
    if(line[count]==''):
        line.remove('') #removing spaces
        count=count-1
    count=count+1

#print line 


count=0

name=0
names_xl=[]
while(count<len(line)):
     list=line[count].split()
     #print list
     wor2=difflib.get_close_matches('Name', list)
     #print wor2
     if(len(wor2)>0):
         name=count
         #print name
         #print line[name]
         holder_name=line[name].split() #holder's name
         parent_name=line[name+1].split() #parent's name
         holder_name.pop(0) #popping 'name'
         parent_name.pop(0)
         #print holder_name
         #print parent_name
         d=' '.join(holder_name)
         e=' '.join(parent_name)
         #for printing name of holder
         #print d
         #for printing name of parent
         #print e
        
     count=count+1
     

with open('license.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
        names_xl.append(row['NAMES'])

#print names_xl #printing list of names in excel file


  
with open('license.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
       hname=difflib.get_close_matches(d,names_xl) #if holder's name length is >1 that means fathers name is included
       if len(hname)==1:
           fname=difflib.get_close_matches(e,names_xl) #else take differently
    #print hname
    #print fname



heading=['Name','Father Name','DOB','LicenseNo']

if len(hname)==1:
    temp=hname+fname+dob1+dl_no2
    na=hname[0]
    fna=fname[0]
else:
    temp=hname+dob1+dl_no2
    na=hname[0]
    fna=hname[1]
final=dict(zip(heading,temp)) 
#print final #in dictionary format

string={"Name":na,"Father Name":fna,"DOB":dob1[0],"LicenseNo":dl_no2[0]}
#print string


with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(string, fp)


print "</body></html>"

#json=json.dumps(final)
#print json #in json format



