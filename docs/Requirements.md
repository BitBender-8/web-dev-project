For the best experience, open this in the Obsidian application. Alternatively install the markdown enhanced extension in vscode.

# Updates

Changes made to the code that need to be propagated toward the requirements.

- Removed religion and ethnic origin fields from all forms.
- Mother and father in birth does not have sex fields
- Removed abandoned child section from birth form
- Removed principal residence and occupation field from death form
- Removed signatures from marriage form

# Requirements

---

The website is for the general public to use. Institutions (the military, police, calamity handling organs, hospitals, common dwelling places like prisons, boarding schools, etc.) must use other means. It is important to note that the site doest not handle processing only mere registration.

Once data is submitted, no corrections are allowed. The same goes for annulements of records. All records have a registration id attached to them. Before submission, the user will be shown a simple report that shows all the data they have entered and will be shown to confirm their submission.

## Forms

### Live birth

> [!Definition]
> LIVE BIRTH is the complete expulsion or extraction from its mother of a product of conception, irrespective of the duration of pregnancy, which, after such separation, breathes or shows any other evidence of life.

- The child's
  - full name, sex, date of birth, place of birth, type of birth (single or more) and aid rendered during birth, weight at birth
- The child's parents'
  - full name, date of birth, principal residence, martial status, citizenship, religion, ethinic origin and, if alive their signatures.
- Where the declarant is other than the parent of the child, the delclarant's
  - full name, relation with the child, sex, date and place of birth, principal residence and signature;
- Date of registration
- Birth of an abandoned child shall contain
  - he name given to the child, sex, and estimated age of the child and the date and place where the child was found
    - a phrase abandoned child on the backside of the registration form

### Marriage

> [!Definition]
> MARRIAGE is the legal union of persons of opposite sex. The legality of the union may be established by ciVil, religious, or other means as recognized by the laws of each country

- The couples'
  - full name, date and place of birth, principal residence, citizenship, ethnic origin and religion
- the date and place of the marriage
- the couples' signature
- the names, sex, date of birth and principal residences of witnesses of the marriage
- previous martial status of both couples, (single, divorced, widowed)
- date of registration

### Divorce

> [!Definition]
> DIVORCE is a final legal dissolution of a marriage, that is, the separation of husband and wife by a judicial decree which confers on the parties the right to civil and/or religious remarriage, according to the laws of each country.

- the full name, date and place of birth, principal residence, citizenship, ethnic origin and religion of each divorcing partner
- the date and place of conclusion of the marriage and the date of divorce
- a reference to the decision of the competent court on the divorce (or 'reason for divorce')
  - "Any court which has rendered decision on divorce shall forthwith provide copies of the decision to the divorcing partners."
- date of registration

### Death

> [!Definition]
> DEATH is the permanent disappearance of all evidence of life at any time after live birth has taken place (post-natal cessation of vital functions without capability of resuscitation). This definition therefore excludes fetal deaths.

- the full name, sex, title, age, occupation, principal residence, citizenship, ethnic origin and religion of the deceased
- date, place and cause of the death and a reference to evidence of the death, if any
- date of registration
- declarant's  full name, sex, principal residence, phone
- delcarant's relation to the deceased
  - Any person who used to live with the deceased
  - his relatives by consanguinity or affinity, close neighbors
  - any person who knows his death

### Stillbirth / ~~fetal death~~

> [!Definition]
> FETAL DEATH is death prior to the complete expulsion or extraction from its mother of a product of conception, irrespective of the duration of pregnancy; the death is indicated by the fact that after such separation the fetus does not breathe or show any other evidence of life.
>
> STILLBIRTH is defined as synonymous with late fetaI death

- the full name(if true), sex of the child, gestational age
- date of delivery, place of delivery,
- the full name, address and martial status of the child's parents
- age of the mother
- plurality of this pregnancy, duration of pregnancy
  - if not single birth specify (born first, second, third, etc.)
- conditions contributing to fetal death. (explain each chosen)
  - maternal conditions/diseases
  - complications of placenta, cord or membranes
  - other obstertical or pregnancy complications
  - fetal anomaly
  - fetal injury
  - fetal infection
  - other fetal conditions/disorders
- name and address of person completing the report.
- date of registration

### Adoption

> [!Definition]
> ADOPTION is the legal and voluntary taking and treating of the child of other parents as one's own, in so far as provided by the laws of each country.

- is the adoption domestic or intercountry?
- the ability to add 2 applicants. Each applicant will complete the following fields
  - first name, surname, date of birth, place of birth, country, address, occupation, relationship (if any) to the child, relationship (if any to applicant 2), relationship (if any) to child's parent.
- category of adopters
  - step parent
  - sole applicant
  - married couple, for 2 applicants
  - two co-habitants
- fields for the child to be adopted
  - full name of the child, date of birth, place of birth, sex of child
  - If the child has been placed in your care please give the name, phone and address of person or body from whom you received the child.
- date of adoption

### ~~(REMOVED) Legitimations~~

- REMOVED LEGITIMATION cause it has little reason to co-exist along with recognitions [created:: 2024-05-16]

> [!Definition]
> LEGITIMATION is the formal investing of a person with the status and rights of legitimacy (status of a child born to parents who are legally married to each other), according to the laws of each country.

- full name of person to be "legitimized"
- date of birth, place of birth, current age, sex
- full name of mother, full name of father, relationship to the person to be "legitimized"
  - martial status of parents
- date of registration

### Recognitions

> [!Definition]
> RECOGNITION is the legal acknowledgment, either voluntarily or compulsorily, of the paternity of an illegitimate child.

- full name, date of birth, place of birth of child
- full name, date of birth, address, phone number, place of birth, occupation of parent2 and parent1.
  - parent1 and parent2 martial status
    - single
    - married
    - legally separated
    - divorced
- was mother married at time of birth
- date of registration

### Annulments

> [!Definition]
> ANNULMENT is the invalidation or voiding of a marriage by a competent authority, according to the laws of each country, which confers on the parties the status of never having been married to each other.

- full name, date of birth, address, phone number, place of birth of couple
- date of marriage, place of marriage between couple, reference to judicial decision (reasons for annulment otherwise)
- date of registration, date of annulment

### Judicial separations

> [!Definition]
> LEGAL SEPARATION is the disunion of married persons, according to the laws of each country, which does not confer on the parties the right to remarry. In other words, it leaves the couple married in the eyes of the law. It sets certain arrangements in place and divides important aspects of the marriage.

- full name, sex, date of birth, address, phone number, place of birth of couple
- date of marriage, place of marriage
- date of separation, date of registration
- reason for separation or a court reference (optional)

## Other functional requirements

### Reports

This section would display a list of generated reports based on event type and date range ~~or other filters (TBD)~~. Users can either view or download these reports in a printable format (e.g., PDF). Here are some basic reports you could generate:

- For all
  - Total count by year, month, or week
- Live births
  - Number of live births by sex (male/female)
  - "Live births by mother's age group" include this if you want to dedicate the time and effort [created:: 2024-05-16]
- Stillbirths
  - Count by gestational age
- Marriages
  - Average age of couples at marriage
  - Number of marriages by previous martial status (single, divorced, widowed)
- Divorces
  - Average duration of marriages ending in divorce
- Adoptions
  - Average age of children adopted
  - Average age of adoptive parents
- Recognitions,
  - Average age of children recognized
- Annulments and judicial separations
  - Average duration of marriages.

- Additional considerations when designing reports.
  - Reports that combine data from different events. For example, you could compare live births and fetal deaths over time.
  - Reports can be presented in various formats like tables, charts and graphs to make the data easier to understand.

### Home

Provides a brief overview of the website's purpose and functionality. It can include links to guides and resources for understanding vital events and their reporting procedures.

### Footer

Footer information:

- Contact info, legal disclaimer, social media and email links, address

### Search (TBD)

- Apply this function only if you want to put in the time and effort. [created:: 2024-05-16]

The website might include a search functionality to find existing reports based on specific criteria like date, event type, or keywords.

> [!resources]+ Resources and related notes
>
> - Primary_resource:: [[proclamation-no-760-2012-registration-of-vital-events-and-national-identity-card-proclamation.pdf]]
> - Other resources
>   - [UN Stats - Principles for a Vital Statistics System](https://unstats.un.org/unsd/demographic-social/Standards-and-Methods/files/Principles_and_Recommendations/CRVS/Series_M19-E.pdf)
>   - [State of Michigan - Report of Fetal Death File](https://www.michigan.gov/mdhhs/-/media/Project/Websites/mdhhs/Folder1/Folder17/DCH0615LFetal.pdf?rev=0e39f6533cba42f88808731b7b30ece5&hash=1E0834E923E635DD8073DAF207E0F518)
>   - [Form from the adoption authority of Ireland](https://aai.gov.ie/images/Form_A1_Application_for_an_Adoption_Order_OCT_2017.pdf)
>   - [For legitimation](https://www.southernjudicialcircuit.com/selfhelp/paternity/legitimation.pdf)
>   - [For recognition](https://ldh.la.gov/assets/oph/Center-RS/vitalrec/AOP_2Party_Public.pdf)
>   - [For judicial separations](https://www.findlaw.com/family/divorce/sample-separation-agreement.html)
