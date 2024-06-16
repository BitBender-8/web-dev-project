# Reminders

- Assign tasks to members
- exit script after all redirections
- Consider implementing the post redirect get pattern for all your forms possiblly asking the user for confirmation on the data they submitted.
- Checkout the docs linked to by Dave Hollingworth for a login system.

# Active tasks

- [ ] Work on the styling of the website.
- [ ] Complete implementing serverside validations for difficult forms. Use the completed ones as reference (What's left can be done as a simple copy-paste job).
  - Questions to consider: What validation do you NEED to do server-side? Which ones COULD you do client-side? Which ones should you consider for both?
  - Completed for
    - adoption.php
    - birth.php
    - death.php
    - recognition.php
    - marriage.php
    - still-birth.php

- [ ] For all dropdowns, checkboxes and radio buttons add an empty option and make it selected by default.
  - Completed for
    - adoption.php
    - birth.php
    - death.php
    - recognition.php
    - marriage.php
    - still-birth.php

- [ ] Make all sex fields a dropdown
  - Completed for
    - adoption.php
    - birth.php
    - death.php
    - recognition.php
    - marriage.php
    - still-birth.php

# Task queue

## Changes in semantics/business logic

- [ ] For all occupation field add instructions that tell users to 'write unknown if unknown, none if none, and retired if retired'.
- [ ] Make sure that all fields which are optional have a label that tells that they are optional

## Misc

- [ ] After completing database code for the input forms. Start working on the report page.

# Other

## Features to consider

- [ ] Search for tasks that start with CONSIDER.
- [ ] Should the date of registration be visible on the report page and the confirmation page?
- [ ] Should certain features be locked behind a login system?

## Completed but kept for docs

- Add sex fields to all person information fields that don't have them.

  - Except for father and mother on birth and stillbrith reg forms

- Add the citizenship, phone number of all adult person fields - only phone number if the person is not central to the form.
  - Except for death registration (no phone number)
- Evidence or court reference fields should be file inputs with the following accept values in declarations.php
- All fields that ask you to supply reasons are optional except for the ones in the still-birth form.
