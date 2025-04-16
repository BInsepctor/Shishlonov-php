select * from users

select * from orders

select orders.name 
from orders 
inner join  users  on users.id = orders.user_id
where users.name Like 'Иванов%'

select users.id, users.name 
from orders 
inner join  users  on users.id = orders.user_id
group by users.id

select users.name, orders.name, orders.amount, orders.created_at
from orders
join users on users.id = orders.user_id
where orders.created_at = (select max(created_at) from orders)

select name 
from orders
where created_at <= '31.03.2023'