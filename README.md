# Documentation
We made changes into the DB creating a new table "employee_hobbies" where represents a many to many relationship between "employees" and "hobbies" tables.

**getEmployeeById**
In this case we join the previous Query with this one to get the employee and the hobbie.
Instead making multiple querys like this one
```sql
  SELECT h.name as 'hobbie' 
  FROM hobbies h  
  INNER JOIN employees_hobbies eh ON h.id = eh.hobbie_id
  WHERE employee_id = $id;
```