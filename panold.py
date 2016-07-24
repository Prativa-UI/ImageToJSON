#!/Python27/python
from PIL import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import json
import re
import csv
import difflib
#import cv2, numpy
import six
from dateutil.parser import parse
from itertools import groupby
from pytesseract import image_to_string
from collections import Counter


cgitb.enable(display=0, logdir="logs/panold")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"


def is_date(string):
    try: 
        parse(string)
        return True
    except ValueError:
        return False

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

def hasNumbers(inputString):
    return any(char.isdigit() for char in inputString)

names=[]
names1=[]
names2=[]
numbers=[]
numbers1=[]
extra=[]
pan=[]
dob=[]
dob1=[]
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
filename, file_extension = os.path.splitext(temp)

img = Image.open(filepath)
#print "Hello world"
img.load()
i = pytesseract.image_to_string(img)
#print i
k=filter(lambda x: ord(x)<128,i)
#print k
p=k.split('\n');
str_list = filter(None, p)
#print str_list



with open('pan.csv') as csvfile:
    reader = csv.DictReader(csvfile)
    for row in reader:
       # if not names:
        names=difflib.get_close_matches(row['Names'],str_list)
        #print names
        names1=names1+names
names2=duplicates(names1)
print names2

numbers=subtract_lists(str_list, names2)
for let in numbers:
    let1="".join(let.split())
    numbers1=numbers1+[let1]

for let in numbers1:
    if(len(let)==10):
        extra=extra+[let]

for let in extra:
    if(re.match("[A-Z]{2}",let,flags=0)):
        pan=pan+[let]
print "pan"
print pan

dob=subtract_lists(extra,pan)

for let in dob:
    if(hasNumbers(let)):
        dob1=dob1+[let]
#print dob1


string ={"Name" : names2[0],"Father Name" : names2[1], "DOB" :dob1[0], "PanNo": pan[0]}
print string

with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(string, fp)

print ""
print "</body></html>"

