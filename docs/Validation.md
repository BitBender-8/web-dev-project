
# Universal validations

- PRIORITIZE SERVER-SIDE VALIDATION.
- The date of registration is inserted automatically when the record gets written to the db.
- Make sure to sanitize all user input.

- [ ] 1. Attributes marked as required in HTML must exist (SERVER, CLIENT-HTML)
- [ ] 2. String length checks for (SERVER, CLIENT-HTML)
    - `<Inputs>`: DEFAULT=100, LONG(for address/explain)=200, SHORT=10
    - `<Textarea>`: DEFAULT=1000, SMALL=500
        - These are constants. You can also use them easily in client-side validation by writing php code that replaces the fields with the values of the constants. 
    - Use universal search and replace
- [ ] 3. Dropdowns, radio buttons and select boxes accept only the values specified in html. (SERVER)
- [ ] 4. Phone number validation (SERVER, CLIENT-HTML)
- [ ] 5. File submitted is of an unacceptable format OR above a certain size. (SERVER)

- SEARCH 'FORM VALIDATION' to look for other form specific validations. All of these validations are done server-side unless specified otherwise.

- [ ] 6. (Ignore for now) Date fields data is submitted in teh appropriate format.

# Other stringent validations (won't be implemented but documents ways things can go wrong - may address this if we have time)
- Dates entered are in the future compared to server time.
- In birth-related forms 
    - child's birthday is older than parents' birthday 
- For separation.html
    - Date of marriage is older than spouses' date of birth
    - Date of marriage is more recent that the date of separation
- For marriage.html
    - Making sure that the data entered for witness 1 and witness 2 is not identical.
    - Date of marriage is not older than the date of birth for the couple.
- For divorce.html
    - Date of marriage is older than spouses' date of birth
    - Date of marriage is more recent that the date of divorce
- For annulment.html
    - Date of marriage is more recent that the date of annulment
    - Date of marriage is older than spouses' date of birth



# Completed but kept for documentation
- What kind of form validation (especially semantic ones) do you need for each page?
- Which validations are universal (must be done for every page)?
- What validation do you NEED to do server-side? Which ones COULD you do client-side? Which ones should you consider for both?
- What data should be inserted automatically? 
    - The date of registration
- Prioritize validations, which ones should you do now? Which ones should you do later?
- What kind of UI enhancements can you make to the form entry process?
