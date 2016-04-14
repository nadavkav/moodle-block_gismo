@block @block_gismo
Feature: Using a quiz activity is viewed in GISMO overviews
	In order to enrol one student in course composed by 
    one quiz activity
	As a admin
	I need to have the right data on GISMO overviews 
	after use of quiz activity
	
	Background:
		Given the following "courses" exist:
			| fullname | shortname | category |
			| Course 1 | C1 | 0 |
		And the following "users" exist:
			| username | firstname | lastname | email |
			| student1 | Student | 1 | student1@example.com |
            | teacher1 | Teacher | 1 | teacher1@example.com |
		And the following "course enrolments" exist:
			| user | course | role |
			| student1 | C1 | student |
			| teacher1 | C1 | editingteacher |

	@javascript @_switch_window
	Scenario: Add one quiz and access GISMO overviews
		When I log in as "teacher1"
		And I follow "Course 1"
		And I turn editing mode on
		And I add the "Gismo" block
 		And I add a "Quiz" to section "1" and I fill the form with:
			| Name        | Test quiz name        |
			| Description | Test quiz description |
			| Attempts allowed | 1 |
 		And I add a "True/False" question to the "Test quiz name" quiz with:
			| Question name                      | First question                          |
			| Question text                      | Answer the first question               |
		And I log out
		And I log in as "student1"
		And I am on homepage
		And I follow "Course 1"
		And I follow "Test quiz name"
		And I press "Attempt quiz now"
		And I press "Start attempt"
		And I should see "Question 1"
		And I should see "Answer the first question"
		And I set the field "True" to "1"
		And I press "Next"
		And I should see "Answer saved"
		And I press "Submit all and finish"
		And I click on "Submit all and finish" "button" in the "Confirmation" "dialogue"
		And I log out
		Then I log in as "admin"
		And I am on site homepage (New step defintion in version 2.9)
		And I follow "Course 1"
		And I synchronize gismo data
		And I go to the "Activities > Quizzes" report
		And I should see "Grade: 0.00 / 10.00" on "Activities > Quizzes" report
		And I wait "10" seconds