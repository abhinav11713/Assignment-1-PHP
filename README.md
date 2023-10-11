# Assignment 1 - Dynamic Website with Database Integration

For this assignment, it was required to construct a website where the user can add content to the database and then have it displayed on a separate page. I created an Employee Working Hours tracking website in which there are 4 input fields. One is to take input of name, ID, date and total hours of a shift.

---
## How to use a Website?

- Turn on the MySQL server on XAMPP
- Download all the files in a folder
- Creating a database named <b>mydb</b>
- Create a table using the following command

```SQL
CREATE TABLE `randomtable11713` (
  `emp_name` varchar(150) NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `shift_date` date NOT NULL,
  `hours` int(10) UNSIGNED NOT NULL
);

ALTER TABLE `randomtable11713`
  ADD PRIMARY KEY (`emp_id`);
```

Then Just run the index.php

A lot of things are covered. A few of them are:
- If the database is empty, it's showing a particular message for that
- Length of input is handled
- There is a Primary key on the ID of the employee. So, submitting a duplicate ID is also handled
- Only Numeric ID is allowed
- The Shift date couldn't be after today
- Max 24 Hours can be added in one shift
