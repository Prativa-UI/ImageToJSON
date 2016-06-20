#!/Python27/python
import os
import json
import sys
import string
import pytesseract
import re
import cgitb
import cgi
import difflib
import csv
from pytesseract import image_to_string
import dateutil.parser as dparser
from PIL import Image, ImageEnhance, ImageFilter

cgitb.enable(display=0, logdir="/var/www/html/iot/OCR/logs/")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"

path = sys.argv[1]
filepath=os.path.join("/var/www/html/iot/OCR/upload/",path)
img = Image.open(filepath)
img = img.convert('RGBA')
pix = img.load()

for y in range(img.size[1]):
    for x in range(img.size[0]):
        if pix[x, y][0] < 102 or pix[x, y][1] < 102 or pix[x, y][2] < 102:
            pix[x, y] = (0, 0, 0, 255)
        else:
            pix[x, y] = (255, 255, 255, 255)

img.save('temp.jpg')
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
idhar=Image.open('/var/www/html/iot/OCR/temp.jpg')
idhar.load()
text = pytesseract.image_to_string(Image.open('/var/www/html/iot/OCR/temp.jpg'))
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
for wordlist in lines.split('\n'):
	xx = wordlist.split( )
	if ([w for w in xx if re.search('(Year|ear|Birth|irth|YoB)$', w)]):
		yearline = wordlist
		break
	else:
		text1.append(wordlist)
try:
	yearline = re.split('Year|Birth|irth|YoB', yearline)[1:]
	yearline = ''.join(str(e) for e in yearline)

	if(yearline):
		ayear = dparser.parse(yearline,fuzzy=True).year
except:
	pass
	
# Searching for Gender
try:
	for wordlist in lines.split('\n'):
		xx = wordlist.split( )
		if ([w for w in xx if re.search('(Female|Male|emale|male|ale)$', w)]):
			genline = wordlist
			break

	if 'Female' in genline:
	    gender = "Female"
	if 'Male' in genline:
	    gender = "Male"

	text2 = text.split(genline,1)[1]

except:
	pass

# Open name database
with open('dummy.csv', 'rb') as f:
	reader = csv.reader(f)
	newlist = list(reader)    
[item for newlist in newlist for item in newlist]

# Searching for Name and finding closest name in database
try:
	text1 = filter(None, text1)
	for x in text1:
		for y in x.split( ):
			if(difflib.get_close_matches(y.upper(), newlist)):
				nameline.append(x)

	name = ''.join(str(e) for e in nameline)
except:
	pass


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
data['Birth of year'] = ayear
data['Uid'] = uid


filename, file_extension = os.path.splitext(path)
# Writing data into JSON
with open('json_file/'+filename +'.json', 'w') as fp:
    json.dump(data, fp)

print data
# Removing dummy files
os.remove('temp.jpg')
'''
# Reading data back JSON
with open('aadhar.json', 'r') as f:
     ndata = json.load(f)

print "+++++++++++++++++++++++++++++++"     
print(ndata['Name'])
print "-------------------------------"
print(ndata['Gender'])
print "-------------------------------"
print(ndata['Birth of year'])
print "-------------------------------"
print(ndata['Uid'])
print "-------------------------------"
#'''
print "</body></html>"
