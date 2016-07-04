use db_test_data;
#Написать запрос который выведет всех пользователей в возрасте от 20 лет с количеством книг более 5
SELECT users.*, COUNT(users_books.book_id) AS `count_book` 
FROM users INNER JOIN users_books ON users.id = users_books.user_id 
WHERE users.age > 20 
GROUP BY users_books.user_id
HAVING `count_book` > 5;
#Написать запрос который выведет пользователей в имени которых присутствует число 3
SELECT * FROM users WHERE users.first_name LIKE '%3%';
#Написать запрос который выведет список пользователей которые не брали книгу с именем "Book #21"
SELECT users.*
FROM users
LEFT JOIN (SELECT ub.user_id as u, ub.book_id
	FROM users_books ub INNER JOIN books b 
	ON ub.book_id = b.id and b.title = "Book #21") t ON 
	t.u = users.id
WHERE book_id IS NULL;
#Написать запрос который добавит поле is_active в таблицу users;
ALTER TABLE users ADD is_active BOOLEAN;
#Написать запрос, который проставит is_active = 1 для пользователей, которые взяли как минимум одну книгу
UPDATE users, users_books SET users.is_active = 1 WHERE users.id = users_books.user_id;
#Написать запрос который добавит поле isbestseller (bool) в таблицу books
ALTER TABLE books ADD isbestseller BOOLEAN NOT NULL;
#Написать запрос который выставит isbestseller = 1 для книг, которые были взяты пользователями более 10 раз
UPDATE books SET books.isbestseller = 1 WHERE books.id IN 
(SELECT ub.book_id FROM users_books ub GROUP BY ub.book_id HAVING COUNT(ub.book_id) > 10);