# 🏨 Swift Retreat – Hotel Booking Management System

## 📘 Project Proposal 

---

## 👥 Group Members

- **Adli Bin Wahid** (2211623)  
- **Nurul Nasreen Binti Abdul Malik** (2217464)  
- **Nur Amira Nabila Binti Mohd Ab Rahman** (2220682)
- **Nur Faizah Binti Omar** (2226856)
- **Farah Binti Mazlan** (2220338)

---

## 📌 Project Title

**Swift Retreat – Hotel Booking Management System**

---

## 📌 Project Video Proposal



---

## 🧠 Introduction

**Swift Retreat** is a web-based hotel booking management system designed to simplify and automate the reservation process while adhering to Shariah-compliant principles. In addition to solving common issues like double bookings, inefficient manual records, and lack of real-time updates, Swift Retreat incorporates Islamic values such as modesty, family-friendly accommodations, and optional amenities like prayer room access and halal-certified food services.

Built using the **Model-View-Controller (MVC)** architecture, this system offers role-based access for administrators, staff, and customers. Customers can browse for available rooms, filter for Shariah-compliant facilities, and make online reservations. Meanwhile, hotel staff and administrators can manage bookings, room statuses, and guest check-ins/check-outs. With responsive design and a user-friendly interface, Swift Retreat aims to enhance the hotel booking experience for all users, particularly those seeking services in line with Islamic values.

---

## 🎯 Objectives

The primary objectives of the proposed web application are:

- To develop a web-based hotel booking system that is Shariah-compliant and built using MVC architecture.  
- To enable customers to search, reserve, and manage bookings online, including filtering for Islamic-friendly features.  
- To help hotel administrators manage room availability, pricing, and customer data in real time.  
- To promote Islamic values in hospitality by offering halal food, Qibla direction, and family-oriented services.  
- To improve operational efficiency and reduce manual errors in the booking process.

---

## 🛠️ Features & Functionalities

Our web application will include the following features:

### ✅ Core Features

**Feature 1: Online Room Booking**  
- Customers can browse available rooms by date and room type, with real-time availability updates.  
- Option to filter rooms with Shariah-compliant features such as prayer mats, Qibla direction, or alcohol-free policies.

**Feature 2: User Roles and Authentication**  
- Secure login system with role-based access for Admin, Staff, and Customers.  
- Different dashboards for each role to maintain security and organization.

**Feature 3: Check-In and Check-Out Management**  
- Staff can manage guest check-in and check-out with proper status updates.  
- Admins can monitor daily occupancy.

**Feature 4: Payment and Invoice System**  
- Customers can make online payments and download official invoices.  
- Admins can view completed transactions and generate financial summaries.

**Feature 5: Admin Room & Staff Management**  
- Admins can add or remove rooms, manage pricing, assign staff, and track performance.  
- Rooms can be labeled as Shariah-compliant for customer awareness.

---

### ✨ Additional Features

- **Shariah-Compliant Filters**  
  Rooms labeled as "Alcohol-Free," "Family Only," or "Prayer Facility Available."

- **Halal Food Service Info**  
  Option to display halal dining availability or nearby halal-certified restaurants.

- **Prayer Facilities Information**  
  Customers can check if prayer rooms, prayer mats, or Qibla directions are available.

- **Email Notifications**  
  Customers receive booking confirmations, check-in reminders, and invoice copies.

- **Responsive Design**  
  Mobile-friendly layout for ease of use across all devices.

- **Booking History**  
  Customers can view and manage their current and previous bookings.

- **Search & Filter**  
  Filter by date, price, room type, and Shariah-compliant attributes.

- **Staff Task List**  
  Staff can view daily assignments such as room service, cleaning, and guest requests.

---
ER Diagram

![ER_Diagram_Swift](https://github.com/user-attachments/assets/9a9e1461-45c9-41bf-b000-12846883e031)

Sequence Diagram

![SD - Guest](https://github.com/user-attachments/assets/cf3e22e8-6ab5-4b92-aa58-7b12acfc4d03)
![SD - Staff](https://github.com/user-attachments/assets/c642ccf6-e42c-4cd9-8a60-162d25a4637e)
![SD - Admin](https://github.com/user-attachments/assets/d0c79f61-a8fd-41af-b48e-f3a278e34bf0)

Screenshot of website mockup

**User's side**
login and register page

![Screenshot 2025-05-22 224640](https://github.com/user-attachments/assets/a0c816ca-b904-46a1-bd07-d32e55d4d938)
![Screenshot 2025-05-22 224647](https://github.com/user-attachments/assets/0d396a42-e319-4f15-8f39-2e39445f3f17)

**landing page**

![Landing page](https://github.com/user-attachments/assets/30bbf602-842d-4729-916a-e7ddcf6310fe)

**payment page**

![Screenshot 2025-05-22 225719](https://github.com/user-attachments/assets/f97110de-a0bb-47dd-8532-ed087f511b90)

**booking management page**

![Screenshot 2025-05-22 224455](https://github.com/user-attachments/assets/be33b35d-0752-45ba-80b2-3e254237e3c4)

**Admin's side**
dashboard

![Dashboard](https://github.com/user-attachments/assets/cb305066-0b90-4fae-a95a-732da7953230)

**guestlist page**

![Guests](https://github.com/user-attachments/assets/d46120ed-f65e-4d90-bdb1-753233054ac3)

**room management page**

![Room](https://github.com/user-attachments/assets/e6b410f6-86df-421e-9bbf-35231340ba6c)

**deals management page**

![Deals](https://github.com/user-attachments/assets/42f9a558-84c9-4b1b-95f9-99ba0bd42ba8)

**room rate page**

![Rate](https://github.com/user-attachments/assets/76c281f8-543d-4d80-97ea-7fbe8bc2d3d2)

**front desk customer management page**

![Screenshot 2025-05-22 225145](https://github.com/user-attachments/assets/6ba18fe2-4d92-46b6-8daf-a2be14f9c23e)


**Report continuation**

**The actual system**
1. mainpage
![Screenshot 2025-06-12 135059](https://github.com/user-attachments/assets/29b7df80-1508-4aa8-a39c-cadc0eba71cc)
- This is the actual mainpage that houses the booking feature.
- The customer will have to fill in details regarding their stay in a simple form that includes:
    - First name,
    - phone number,
    - check-in date,
    - check-out date,
    - type of room,
    - and number of adults and childrens that will be staying.
- Other things that are available in the page is pictures of the rooms, customers' reviews, contact info, and many more.
- Once the customer has fill in the form and clicked the "Book Now" button, they will be redirected to the payment page.

3. payment page
![Screenshot 2025-06-12 220045](https://github.com/user-attachments/assets/e3162cb7-d359-44b7-9a11-6b8774a396c2)

- This is the payment page displayed after a successful booking.
- The customer is required to enter their card details, including:
    - Name on Card
    - Card Number
    - Expiry Month    
    - Expiry Year
    - CVV

- An option is available to save the card details for future payments.

- After clicking the "Pay Now" button, a confirmation message will appear indicating that the payment was successful.

- The customer can then click the "Done" button or the Close (✕) button to return to the main page.

3. dashboard
![Screenshot 2025-06-12 135109](https://github.com/user-attachments/assets/e7650629-003c-419a-bc16-a05d800f8282)

This Dashboard Page serves as the central overview panel for the hotel management team, allowing them to monitor operations, room occupancy, bookings, revenue, and guest feedback in real-time.

🔷 Sidebar Navigation (Left Panel)
The sidebar provides quick access to different modules in the system:

Dashboard: This current summary page that gives a bird’s-eye view of the hotel’s daily operations.
Facilities: Manages room or hotel-wide facilities (e.g. gym, pool, Wi-Fi).
Guest: Manages guest information and records.
Rooms: View, add, edit, or delete room details.

🔹 Top Bar
Login: Appears if a user is not logged in (might change to "Logout" if logged in).
Create Booking Button: Allows the admin/staff to quickly initiate a new room booking process.

📊 Dashboard Overview Section
✅ System Status
System Status: All Services Operational — Indicates the backend system is running without issues.

📅 Daily Operations Summary
1. Today’s Check-in:– Number of guests checking in today
2. Today’s Check-out:– Number of guests checking out today.
3. Total in Hotel:– Total current occupants across all rooms.
4. Today’s Bookings:– New bookings made today.
5. Available Rooms:– Number of rooms currently unoccupied and ready.
6. Today’s Revenue:– Revenue earned for the day from bookings.
7. Prayer Requests:– Number of prayer requests made by guests (may relate to a religious service or spiritual offering provided by the hotel).

🛏️ Room Types & Pricing
Displays types of room packages available and occupancy
- This section helps staff monitor room demand and occupancy per room category.

🧼 Room Status
Summarizes the condition of all rooms in the hotel

🏢 Floor Status
– Indicates the current completion level of floor cleaning, inspection, or maintenance tasks.

💬 Guest Feedback
A small preview section for recent guest comments
- This helps management quickly identify and address guest concerns.

4. facilities page
![Screenshot 2025-06-12 135115](https://github.com/user-attachments/assets/f6d92164-860f-4163-9131-19c0a4f0dc31)

![Screenshot 2025-06-12 220634](https://github.com/user-attachments/assets/b09f9ac3-11f7-4e2f-911f-bb7a36ef65bd)


The Facilities Page allows hotel staff to manage and customize room-specific features offered to guests. This page displays an overview of available facilities for each room and enables quick editing or addition of new facilities, 
ensuring the hotel’s offerings are always up-to-date.

**Key Functionalities:**

1. Display Table Overview:
- Shows a list of rooms with their assigned Guest ID, Room Number, and key facilities such as:
a) Prayer Room
b) Halal Dining
c) Family-Friendly Options
d) Status (Active/Inactive

- Facilities are indicated using ✅ (Y) and ❌ (X) as visual indicators to allow staff to instantly assess room readiness and feature availability.
- Real-time tracking helps staff ensure proper room allocation based on guest preferences.

2. + Add Facility Button:
- Opens a form modal where staff can manually assign or update room facilities. Form fields include:
a) Room Number
b) Prayer Room (Yes/No)
c) Halal Dining (Yes/No)
d) Family Friendly (Yes/No)
e) Status (Active/Inactive)

3. Edit Button:
- Allows staff to update the facility info for any room if changes are required.

4. Delete Button:
- Delete: Remove an entry when no longer relevant.

5. Save Facility Button:
- Saves the input locally within the current page view.
- Changes are reflected immediately in the table, helping staff keep track of updates easily and visually.


5. room page (add room)
![Screenshot 2025-06-12 135138](https://github.com/user-attachments/assets/e9c7becf-d09d-44d9-949e-27ba2db82f7f)

![Screenshot 2025-06-12 220443](https://github.com/user-attachments/assets/7ceb769c-9740-4c7a-8a5d-3823a18b7776)

This Room Management Page is designed to display and manage all rooms in the hotel system. It serves as a centralized view for staff or administrators to keep track of room availability and key details.

**Key Functionalities:**
1. Room Listing
  The page lists all rooms, showing details such as:
  - Room Number
  - Bed Type
  - Floor
  - Included Facilities (e.g., AC, bathtub, TV)
  - Availability Status (Available or Booked)

2. Filtering Options
  Users can filter rooms using the top buttons:
  - All Rooms: Shows every room in the system.
  - Available (X): Filters and displays only rooms that are currently unoccupied.
  - Booked (X): Filters and displays rooms that are currently booked.

**Staff Use Case**
1. Staff can quickly identify which rooms are booked or available, allowing them to:
2. Assign rooms to guests efficiently.
3. Inform guests about specific room features or facilities upon request.

**Room Management**
The admin has full control over room records and can:
1. Add a new room using the “Add room” button.
2. Edit existing room details (e.g., bed type, floor, facilities).
3. Delete rooms if they are no longer in service.

   
6. guest page (add guest)
![Screenshot 2025-06-12 135127](https://github.com/user-attachments/assets/ee0bd369-0569-41bf-ae95-9e4b1b84df26)
**Guest Management Page – Admin View**
The Guest Management page is a centralized interface designed for admin or staff use in managing customer information related to room bookings and reservations. It simplifies the process of storing, updating, and removing guest records, ensuring efficient data handling and smooth hotel operations.

**Key Functionalities:**
1. "+ Add New Guest" Button:
   - Allows staff to manually add new guest records into the system.

2. "Edit" Button:
   - Enables admins to edit guest information.
   - Useful for handling last-minute changes or correcting data entry errors.

3. "Delete" Button:
   - Allows staff to remove guest records from the system completely.
   - Ensures data cleanliness and prevents clutter in the booking system

![Screenshot 2025-06-12 220345](https://github.com/user-attachments/assets/73ee0800-3a56-43bb-a5fc-101e4516ede3)
**Add New Guest – Form Interface**
This form appears when the “+ Add New Guest” button is clicked on the Guest Management page. It allows admin or staff to input and register new guest details into the system as part of the reservation process. This form is essential for capturing complete guest information to ensure a smooth check-in experience.

**Key Functionalities:**
1. "Save" Button:
   - Staff can fill in and submit the guest's information, including:
     - Full Name
     - Username
     - Email Address
     - Phone Number
     - Password
     - Booking Date
     - Check-In Date
     - Check-Out Date
     - Payment Status (dropdown with options: Paid, Pending, Cancelled)
   - All submitted data is seamlessly stored in the connected MySQL database via phpMyAdmin, ensuring real-time data integration.

2. "Cancel" Button:
   - Closes the form without saving any information.
   - Useful when admins need to abort the operation or correct data before submission.
  


**The Challenges/Difficulties in developing the application**

   **Adly**

   
   **Nasreen**
   1. I find the database part to be the most challenging, especially when the submitted data doesn't always get stored correctly in the phpMyAdmin tables. 

   **Nur Amira Nabila**
   1. has problem connected page with sidebar. having a hard time to merge layout page with sidebar layout
   2. has an error on saving the room data. but the database save the data.

   **Nur Faizah Binti Omar**
   1. A key challenge in guest management is the inefficiency and inaccuracy of manually handling guest data,

   **Farah Binti Mazlan**
   1. Getting the facility data to update properly without using a real database. Since everything happens on the same page, to make sure the info shows up correctly in the table every time I add or edit something giving me a hard time.
   2. I also faced difficulty ensuring that the form selections (dropdowns) worked correctly and updated the table immediately with visual indicators (✅ or ❌) and status tags (Active/Inactive).
   3. To make sure the form inputs were connected properly to the backend. Then, making sure the form doesn’t let user save unless everything’s filled in took a lot of trial and error.
























