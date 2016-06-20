#!/Python27/python
from PIL import Image
import pytesseract
import cgitb
import cgi
import sys
import os
import json
import re
import cv2, numpy
from pytesseract import image_to_string

cgitb.enable(display=0, logdir="/path/to/logdir")

"Content-type: text/html"
print
print "<html><head>"
print ""
print "</head><body>"
#Reading text from Image 
temp=sys.argv[1]
filepath=os.path.join("upload/",temp)
filename, file_extension = os.path.splitext(temp)
img = Image.open(filepath)
img.load()
i = pytesseract.image_to_string(img)
#print i
#bank Name
try:
	f1 = re.search(' (.+?) BANK', i).group(1)
except Exception:	
	print "Bank Name cannot be identified"

	
#name
try:
  f3=re.search('I (.+?)\n\nP',i).group(1)
except Exception:
	try:
		f3=re.search('I(.+?)\n\nP',i).group(1)
	except Exception:	
		print " person Name cannot be identified"


#ifsc code cropped 

image = cv2.imread(filepath)
crop_img = image[100:400, 100:700]

cv2.imwrite('resized1.jpg',crop_img)

img = Image.open('resized1.jpg')
img.load()
i = pytesseract.image_to_string(img)

try:
	f2=re.search(' IFSC : (.*)',i).group(1)
except Exception:	
	print "Bank Name cannot be identified"




#cropped one

image = cv2.imread(filepath)
crop_img = image[500:800, 200:900]

cv2.imwrite('resized.jpg',crop_img)

img = Image.open('resized.jpg')
img.load()
i = pytesseract.image_to_string(img)

#bank account
f4=re.search('([0-9]{14})',i).group(1)

string= {"Bank Name": f1, "IFSC Code":f2,"Account No":f4,"Name":f3 }
print string



with open('json_file/'+filename + '.json', 'w') as fp:
	json.dump(string, fp)


#i=unicode(i,'utf-8')

print ""
print "</body></html>"
