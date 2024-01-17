@home
Feature: Home page
  Every visitor should be able to access the home page

  Scenario: User can access home page
    Given I am on "/"
    And The response status code should be 200