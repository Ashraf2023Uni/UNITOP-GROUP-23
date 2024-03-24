# UNITOP-GROUP-23
Group 23s team project
Mohammed Sabil Ali - 
Sign-up and login 
1. From index.php press sign up, takes you to register.php
2. On register.php you should follow the fields to sign up input 
- email following validation (ac.uk) that hasnt been used before
- select university with search/drop down
- use a phone number that hasnt been used before
- create password that follows validation 
- confirm password that follows validation 
3. Once sign-up is clicked the user will be taken to login.php
4. User should input login details (email & password)
5. If details are correct user is then taken to index.php where they are now logged in.

Accounts - view profile, change password and view orders
1. The user must be signed in by following sign-up and login as shown above.
2. User should click accounts button takes them to accounts.php
3. They will then be shown their profile details with view profile, view orders and change password.
4. if the user clicks view profile it will show all their details they inputted in sign-up
5. view orders shows any created orders.
6. change password allows them to change password following the same validation as login and sign-up does.

Noor -
Instructions to return an order:
1. From index.php press the 'log in' button under the navigation & category bar
2. Log in to an account with an admin-verified order (recommended account: User='h.h@aston.ac.uk' , Password='Test12345')
3. Go to accounts page which can be found in the navigation bar.
4. Once on the accounts page, press menu button 'View Your Orders' on the left side of the screen.
5. From this page, find an order with 'Delivery status: completed'.
6. At the bottom of order, there should be a 'Return Items' button. Press this to open return form.
7. Once the return form has been opened, (optional) type your reason for returning items in text box.
8. Press button 'Confirm Return', this will store entries into returned_orders table.
9. A message should display saying 'Thanks, we'll let you know once we recieve your items.'. Press 'Return to Homepage' button from here.  
10. Repeat steps 3 and 4 to view your orders. The order you had previously returned should now state 'Delivery status: verifying return'.

11. Ashraf -
12. Instructions for admin –
(Assuming you are on the main home page index.php) Click on the staff login link or icon to take you to a pin page (admin_pin.php).
Enter the pin 0000 to see admin sign up
You can register with any email, password and phone number
This will redirect you to admin login. Enter the details you used on Admin sign up to register exactly for login as it is case sensitive.
This will take you to the admin dashboard and show you buttons to different parts of Admin. Instructions for these sections are in the paragraphs below –

Adjust Stock –
Press the button labelled “Adjust Stock”.
Enter the value you want the stock to be into the box on the right on your selected product and then press update stock.
After you are done you can logout from the greyed out logout button on the bottom-right side of the page or go back to admin dashboard (admin_index.php) by pressing the back button for your browser which location is depending on whatever browser you are on. You may need to press it twice but the new current stock value will be saved.

Change your password – 
Press the Change your password box on the admin home page.
Enter your current password into the current password field
Your password is now changed.
Enter your new password into the new password field and confirm new password field. Ensure these two fields match. Then press Change Password.
Then Logout and press the link to the homepage
Go back to staff login on top right of the page and enter the pin 0000
Then press on the link to Sign in underneath the register button and the text “Already got an account?”.
Your password has now changed so sign in with whatever you put your new password as.

Customer Management –
Press the button labelled Customer Management. This will take you to a page where all data in the customers table is shown and four links. These four links are to either add a customer, update a customer, delete a customer or go back to the admin home page.
To add a customer, you press the Add Customer link and then enter the boxes with values. The email must include an @ and end with .com. The Phone Number box must be an integer/integers. You then press the submit box Add Customer. You can go back to Customer Management (admin_change_customers.php) with the link below.
To update a customer, you press the Update Customer link. You need to enter the Customer ID of the customer you want to update. The new email must include an @ and end with .com. The new Phone Number box must be an integer/integers. You then press the submit box Update Customer. You can go back to Admin Home page (admin_index.php) with the link below. You have to go back to the admin home page because it says url not found if you go back to the main customer management page.
To delete a customer, you press the Delete Customer link. You need to enter the Customer ID of the customer you want to delete. You then press the submit box Delete Customer. You can go back to Admin Home page (admin_index.php) with the link below. You have to go back to the admin home page because it says url not found if you go back to the main customer management page.
Orders –  
Once you press orders it will display all orders with the status of “pending”.
 When you press the submit box of Update All Orders to Complete, then the orders as pending will now have their status on the database changed to “completed”.
Then you will be redirected to a page showing the link to go back to the admin home page 

Products – 
Here you can press the Products box from the home page which will take you to a page called Product Management (admin_products.php).
This Page will have a link to take you back to home page and a  search bar to search for products and a list of products with their current stock level underneath.
You must press search once you have entered values into the search bar. This is not case sensitive. Then the list underneath will update with whatever you have searched. To reset the list empty the search bar and make sure the option next to it is set to All and press Search again.
Unfortunately, the Low Stock and Out of Stock option don’t work.

Report –
Press the Report box on the admin homepage.
This will load up the Stock Levels and Orders Report. It will show current stock levels with product ID, product name, and the stock number. Then beneath that, it will show All Orders which will show the Order ID, the user ID, the Order Date, and the status.
You need to press the back button on your browser as there is no link on this page to take you back to admin home page.
How to logout of Admin – 
(Assuming you are on the admin dashboard/admin_index.php) There is a logout button on the bottom-right side of the page greyed out. Press this button.
You can press the home page link to go back to the guest/customer home page (index.php).
