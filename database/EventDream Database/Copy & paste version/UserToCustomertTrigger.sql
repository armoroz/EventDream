alter table customer add column userid bigint unsigned;
alter table customer add constraint FK_customer_user foreign key(userid) references users(id);
ALTER table customer add constraint FK_customer_user_unique UNIQUE (userid);

drop trigger if exists createCustomer;
delimiter $$
CREATE TRIGGER createCustomer
AFTER INSERT ON users
FOR EACH ROW
BEGIN
   INSERT INTO customer (username, email, userid, created_at)
   VALUES (NEW.name, NEW.email, NEW.id, NOW());
END;