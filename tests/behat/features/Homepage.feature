@homepage
Feature: Homepage
  In order to verify that homepage works for anonymous users

  @javascript
  Scenario: Check homepage response
    Given I am on "/"
    Then I should be on "/"
    And the response status code should be 200

  Scenario: Check footer
    Given I am on "/"
    Then I should see "Quick links"
    And I should see "CBD links"
