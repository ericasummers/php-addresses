# PHP Address Book

#### _A webpage that displays a contacts list, 10 February 2017_

#### By _**Erica Wright**_

## Description

This webpage will allow the user to enter a new contact and view a list of previously stored contacts, as well as clearing the list.

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub](https://github.com/ericaw21/php-addresses.git).
2. Run `composer install --prefer-source --no-interaction` from project root
3. Create a local server in the /web directory within the project folder using the command: __php -S localhost:8000__ (assuming you are using a mac).
4. Open the directory http://localhost:8000/ in any standard web browser.

## Specifications
* Phase 0 - Set up Silex / Twig Framework

* Phase 1 - Focus on Backend Functions - Assume word "flabbergasted" and max wrong guesses of 7

|Behavior|Input|Output|
|--------|-----|------|
| Show underscores | flabbergasted | _ _ _ _ _ _ _ _ _ _ _ _ _ |
| Correct Letter | b | show 2 b's |
| Incorrect Letter | i | show wrong guess count 1 |
| Repeated guess | b (or i) | error message |
| Repeated correct guesses | (other letters) | reveal more correct letters |
| Finish word | all letters guessed | winning message |
| Max wrong guesses | q etc. | losing message |

* Phase 2 - Create engaging front End with existing backend functionality

* Show hanged man on main page

* Show underscored word underneath empty hangman and start game

* Ask for a letter guess

* Output letter if correct, or update hangman until win or lose

* End specifications

## Known Bugs

No known bugs.

## Support and contact details

Please contact ericaw21@gmail.com with questions or concerns.

## Technologies Used

* _HTML_
* _CSS_
* _Bootstrap_
* _PHP_
* _Silex_
* _Twig_
* _Composer_

## License

*MIT license*

Copyright (c) 2017 {**Erica Wright**} All Rights Reserved.
