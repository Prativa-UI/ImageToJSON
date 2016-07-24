#!/usr/bin/env python
import os
import os.path
import json
<<<<<<< HEAD
import sys
import string
import pytesseract
import re
=======
import string
import pytesseract
import re
import cgitb
import cgi
import sys
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
import difflib
import csv
import dateutil.parser as dparser
from PIL import Image, ImageEnhance, ImageFilter
<<<<<<< HEAD
path = sys.argv[1]

img = Image.open(path)
=======
from pytesseract import image_to_string

cgitb.enable(display=0, logdir="logs/adhar")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"


path = sys.argv[1]
filepath=os.path.join("upload/",path)
filename, file_extension = os.path.splitext(path)

img = Image.open(filepath)
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
img = img.convert('RGBA')
pix = img.load()

for y in range(img.size[1]):
    for x in range(img.size[0]):
        if pix[x, y][0] < 102 or pix[x, y][1] < 102 or pix[x, y][2] < 102:
            pix[x, y] = (0, 0, 0, 255)
        else:
            pix[x, y] = (255, 255, 255, 255)

img.save('temp.jpg')
<<<<<<< HEAD
'''
w,h=img.size
e=int(0.2*w)
f=int(0.1*h)
e1=int(0.7*w)
f1=int(0.6*h)
img.crop((e,f,e1,f1)).save('img3.jpg')
texttest = pytesseract.image_to_string(Image.open('img3.jpg'))
print(texttest)
#'''

text = pytesseract.image_to_string(Image.open('temp.jpg'))
=======
idhar=Image.open('temp.jpg')
idhar.load()
text = pytesseract.image_to_string(idhar)
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
text = filter(lambda x: ord(x)<128,text)


# Initializing data variable
name = None
gender = None
ayear = None
uid = None
yearline = []
genline = []
nameline = []
text1 = []
text2 = []

# Searching for Year of Birth
lines = text
<<<<<<< HEAD
for wordlist in lines.split('\n'):
	xx = wordlist.split( )
	if ([w for w in xx if re.search('(Year|ear|Birth|irth|YoB)$', w)]):
=======
#print lines
for wordlist in lines.split('\n'):
	xx = wordlist.split( )
	if ([w for w in xx if re.search('(Year|Birth|irth|YoB|YOB:|DOB:|DOB)$', w)]):
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
		yearline = wordlist
		break
	else:
		text1.append(wordlist)
try:
<<<<<<< HEAD
	yearline = re.split('Year|Birth|irth|YoB', yearline)[1:]
	yearline = ''.join(str(e) for e in yearline)

=======
	text2 = text.split(yearline,1)[1]
except:
	pass

try:
	yearline = re.split('Year|Birth|irth|YoB|YOB:|DOB:|DOB', yearline)[1:]
	yearline = ''.join(str(e) for e in yearline)
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
	if(yearline):
		ayear = dparser.parse(yearline,fuzzy=True).year
except:
	pass
	
# Searching for Gender
try:
	for wordlist in lines.split('\n'):
		xx = wordlist.split( )
<<<<<<< HEAD
		if ([w for w in xx if re.search('(Female|Male|emale|male|ale)$', w)]):
=======
		if ([w for w in xx if re.search('(Female|Male|emale|male|ale|FEMALE|MALE|EMALE)$', w)]):
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
			genline = wordlist
			break

	if 'Female' in genline:
	    gender = "Female"
	if 'Male' in genline:
	    gender = "Male"

	text2 = text.split(genline,1)[1]

except:
	pass

#-----------Read Database
<<<<<<< HEAD
=======
with open('namedb1.csv', 'rb') as f:
	reader = csv.reader(f)
	newlist = list(reader)    
newlist = sum(newlist, [])
#'''

'''
#-----------Read Database
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
with open('namedb.csv', 'rb') as f:
	reader = csv.reader(f)
	newlist = list(reader)    
newlist = sum(newlist, [])
<<<<<<< HEAD
=======
#'''
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f

# Searching for Name and finding closest name in database
try:
	text1 = filter(None, text1)
	for x in text1:
		for y in x.split( ):
			if(difflib.get_close_matches(y.upper(), newlist)):
				nameline.append(x)
<<<<<<< HEAD

=======
				break
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
	name = ''.join(str(e) for e in nameline)
except:
	pass

<<<<<<< HEAD

=======
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
# Searching for UID
try:
	newlist = []
	for xx in text2.split('\n'):
		newlist.append(xx)
	newlist = filter(lambda x: len(x)>5, newlist)
	ma = 0
	uid = ''.join(str(e) for e in newlist)
	for no in newlist:
		if ma<sum(c.isdigit() for c in no):
			ma = sum(c.isdigit() for c in no)
			uid = int(filter(str.isdigit, no))
except:
	pass
	
# Making tuples of data
data = {}
data['Name'] = name
data['Gender'] = gender
data['Birth year'] = ayear
data['Uid'] = uid

# Writing data into JSON
<<<<<<< HEAD
with open('../result/'+ os.path.basename(sys.argv[1]).split('.')[0] +'.json', 'w') as fp:
    json.dump(data, fp)
=======
with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(data, fp)
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f


# Removing dummy files
os.remove('temp.jpg')

'''
# Reading data back JSON
<<<<<<< HEAD
with open('../result/'+sys.argv[1]+'.json', 'r') as f:
=======
with open('../result/'+ os.path.basename(sys.argv[1]).split('.')[0] +'.json', 'r') as f:
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
     ndata = json.load(f)

print "+++++++++++++++++++++++++++++++"     
print(ndata['Name'])
print "-------------------------------"
print(ndata['Gender'])
print "-------------------------------"
print(ndata['Birth year'])
print "-------------------------------"
print(ndata['Uid'])
print "-------------------------------"
#'''
<<<<<<< HEAD
=======
print ""
print "</body></html>"
>>>>>>> c0f643ecd4acf0102c4e396798269a5920e3310f
