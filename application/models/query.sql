#Query returns number of days between dates
SELECT DATEDIFF('2020-10-13', NOW()) AS 'Result'

#Run to select from a table and see rows having days difference equal to 30
SELECT DATEDIFF(date_of_expiry, NOW()) AS 'Result' FROM contract

## IF (TRUE) update status checked so next time this row would not be checked for notification

