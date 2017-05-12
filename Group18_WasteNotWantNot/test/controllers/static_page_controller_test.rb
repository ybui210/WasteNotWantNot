require 'test_helper'

class StaticPageControllerTest < ActionDispatch::IntegrationTest
  def setup
    @base_title = "Ruby on Rails Tutorial Sample App"
  end

  test "should get root" do
    get static_page_home_url
    assert_response :success
  end

  test "should get home" do
    get static_page_home_url
    assert_response :success
  end

  test "should get help" do
    get static_page_help_url
    assert_response :success
  end

  test "should get about" do
    get static_page_about_url
    assert_response :success
  end

  test "should get contact" do
    get static_page_contact_url
    assert_response :success
  end

end
