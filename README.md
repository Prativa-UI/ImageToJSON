# Hi Prativa-UI please delete repository this repo contain some my private information.
# Please I request you that delete this repo
# If you want repo like this you can fork following link:
	https://github.com/dilippuri/PAN-Card-OCR
*****************************************************
Problem:
*****************************************************
	Extract information from image of Aadhaar Card/PAN/Bank Cheque/Driving Licence by OCR in proper format.
		Imformation like - 
					Name, Father's Name, DOB, Gender, UID, PAN, Address, etc.

*****************************************************
Solution:
*****************************************************
	Steps:
		-> Take image
		-> crop to box(which has text in it)
		-> convert into gray scale(mono crome)
		-> give to tesseract
		-> text(output of tesseract)
	Now we will process this text means we will get meaningful information from it.
		-> find name using name database
		-> find father's name
		-> find DOB
		-> find gender
		-> find for Aadhar ID(UID)
		-> find PAN
		-> find Address, etc.
*****************************************************
Dependent packages:
*****************************************************
	-python
	-opencv
	-numpy
	-pytesseract
	-JSON
	-difflib
	-csv
	-PIL
	-SciPy
	-dataparser

*****************************************************
Structure and Usage:
*****************************************************
	Directories:
		src-
			which contains code files		
		testcases-
			which contains testing images
		result
			it contains JSON object
			
	Usage:
		run index.php file
		upload image of document
		choose type of document
		hit process button
			-result file
		for process again hit button
		for download file[json] hit download button
