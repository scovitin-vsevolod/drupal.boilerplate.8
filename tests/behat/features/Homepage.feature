@homepage
Feature: Homepage
  In order to verify that homepage works for anonymous users

  @javascript
  Scenario: Check homepage sections
    Given I am on "/"
    Then the response status code should be 200
    And I should see a ".slick-track" element
    And I should see "Latest updates"
    And I should see "Demo static block"
    And I should see "Quick links"
    And I should see "Information links"
