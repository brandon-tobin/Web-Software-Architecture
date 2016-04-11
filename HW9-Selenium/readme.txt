Name: Brandon Tobin
Project: Hw9-Selenium
GitHub: https://github.com/uofu-cs4540/820304
Login Information:
    Admin Access: Username->admin Password->admin
    Faculty Access: Username->faculty Password->faculty
    Student Access: Username->student Password->student


We were to use Selenium to test the functionality of our Grad Progress system. I wrote four tests to complete this assginment and show my knowledge of constructing Selenium tests. More information about the tests are as follows:

Test: Test_Login
This test tests login functionality by logging into the admin account. Once logged into the account, it checks if the main header (h1.form-header) on the page says "Welcome Back Admin". If the page does not say the expected text, the test will fail.

Test: Access_Forbidden
This method tests to see if a student account can access a DGS level page. Once logged into a student account, it tries to go to the DGS overview page and checks to see if the main header (h1.form-header) on the page says "Access Forbidden". If the page does not say the expected text, the test will fail.

Test: Create_Form
This method tests to see if a student can create a new progress form. Once logged into a student account, it creates a new progress form. After submitting the new form, the test reopens the form using the view link on the student's form list and then checks to see if the form is loaded correctly when viewed in the graduate system.
        
Test: Change_Student_Information
This method tests to see if a student can update their information, committee, etc. Once logged into a student account, it updates the student's information and then checks to see if the information loaded from the database is correct when viewed in the graduate system.

With the tests I generated, I feel that more tests can easily be generated to form a more complete testing suite of the Grad Progress system. I feel that the tests I have made test a good portion of the Grad Progress system and further tests can be easily made by copying and adjusting the code of the tests provided. 