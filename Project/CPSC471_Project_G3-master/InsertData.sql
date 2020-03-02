/* add 3 administrators */

insert into administrator (id,
                           password,
                           password_question,
                           answer_of_password_question,
                           address,
                           phone_number,
                           date_of_registration,
                           date_of_birth,
                           username,
                           first_name,
                           middle_initial,
                           last_name)
VALUES (uuid(),
        'admin_password',
        'admin_password_question_1',
        'admin_answer_of_password_question_1',
        '79203 Andrea Pass Apt. 701',
        '1-615-446-421',
        curdate(),
        '1993-01-01',
        'admin_1',
        'ROBERT', 'L', 'AYERS');

insert into administrator (id,
                           password,
                           password_question,
                           answer_of_password_question,
                           address,
                           phone_number,
                           date_of_registration,
                           date_of_birth,
                           username,
                           first_name,
                           middle_initial,
                           last_name)
VALUES (uuid(),
        'admin_password',
        'admin_password_question_2',
        'admin_answer_of_password_question_2',
        '79203 Andrea Pass Apt. 702',
        '1-615-446-422',
        curdate(),
        '1993-01-02',
        'admin_2',
        'ROBERT', 'L', 'AYERS');

insert into administrator (id,
                           password,
                           password_question,
                           answer_of_password_question,
                           address,
                           phone_number,
                           date_of_registration,
                           date_of_birth,
                           username,
                           first_name,
                           middle_initial,
                           last_name)
VALUES (uuid(),
        'admin_password',
        'admin_password_question_3',
        'admin_answer_of_password_question_3',
        '79203 Andrea Pass Apt. 703',
        '1-615-446-423',
        curdate(),
        '1993-01-03',
        'admin_3',
        'ROBERT', null, 'AYERS');

/** Insert 3 announcements **/
insert into announcement (id, content, post_date, title)
values (uuid(), 'content_1', curdate(), 'title_1');
insert into announcement (id, content, post_date, title)
values (uuid(), 'content_2', curdate(), 'title_2');
insert into announcement (id, content, post_date, title)
values (uuid(), 'content_3', curdate(), 'title_3');


/** Insert 20 items **/
delete
from seller;
delete
from item;

insert into seller (client_id)
values ((select id from client where ucid = 100000));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_0', 'item_description_0', 146.00, 'used_good', 'books',
        (select id from client where ucid = 100000));
insert into seller (client_id)
values ((select id from client where ucid = 100001));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_1', 'item_description_1', 134.00, 'new', 'consumer_electronics',
        (select id from client where ucid = 100001));
insert into seller (client_id)
values ((select id from client where ucid = 100002));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_2', 'item_description_2', 72.00, 'used_very_good', 'video_games',
        (select id from client where ucid = 100002));
insert into seller (client_id)
values ((select id from client where ucid = 100003));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_3', 'item_description_3', 132.00, 'used_good', 'personal_computers',
        (select id from client where ucid = 100003));
insert into seller (client_id)
values ((select id from client where ucid = 100004));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_4', 'item_description_4', 198.00, 'used_very_good', 'software',
        (select id from client where ucid = 100004));
insert into seller (client_id)
values ((select id from client where ucid = 100005));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_5', 'item_description_5', 197.00, 'used_acceptable', 'electronic_books',
        (select id from client where ucid = 100005));
insert into seller (client_id)
values ((select id from client where ucid = 100006));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_6', 'item_description_6', 104.00, 'used_good', 'musical_instrument',
        (select id from client where ucid = 100006));
insert into seller (client_id)
values ((select id from client where ucid = 100007));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_7', 'item_description_7', 155.00, 'new', 'video_games',
        (select id from client where ucid = 100007));
insert into seller (client_id)
values ((select id from client where ucid = 100008));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_8', 'item_description_8', 110.00, 'used_good', 'consumer_electronics',
        (select id from client where ucid = 100008));
insert into seller (client_id)
values ((select id from client where ucid = 100009));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_9', 'item_description_9', 104.00, 'used_open_box', 'books',
        (select id from client where ucid = 100009));
insert into seller (client_id)
values ((select id from client where ucid = 100010));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_10', 'item_description_10', 163.00, 'new', 'office_products',
        (select id from client where ucid = 100010));
insert into seller (client_id)
values ((select id from client where ucid = 100011));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_11', 'item_description_11', 97.00, 'used_open_box', 'office_products',
        (select id from client where ucid = 100011));
insert into seller (client_id)
values ((select id from client where ucid = 100012));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_12', 'item_description_12', 172.00, 'used_very_good', 'office_products',
        (select id from client where ucid = 100012));
insert into seller (client_id)
values ((select id from client where ucid = 100013));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_13', 'item_description_13', 105.00, 'used_acceptable', 'others',
        (select id from client where ucid = 100013));
insert into seller (client_id)
values ((select id from client where ucid = 100014));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_14', 'item_description_14', 88.00, 'used_acceptable', 'musical_instrument',
        (select id from client where ucid = 100014));
insert into seller (client_id)
values ((select id from client where ucid = 100015));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_15', 'item_description_15', 150.00, 'new', 'personal_computers',
        (select id from client where ucid = 100015));
insert into seller (client_id)
values ((select id from client where ucid = 100016));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_16', 'item_description_16', 51.00, 'used_good', 'others',
        (select id from client where ucid = 100016));
insert into seller (client_id)
values ((select id from client where ucid = 100017));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_17', 'item_description_17', 61.00, 'used_good', 'software',
        (select id from client where ucid = 100017));
insert into seller (client_id)
values ((select id from client where ucid = 100018));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_18', 'item_description_18', 131.00, 'used_acceptable', 'software',
        (select id from client where ucid = 100018));
insert into seller (client_id)
values ((select id from client where ucid = 100019));
insert into item (id, name, description, price, `condition`, type, client_id_of_seller)
values (uuid(), 'item_name_19', 'item_description_19', 64.00, 'new', 'food',
        (select id from client where ucid = 100019));
