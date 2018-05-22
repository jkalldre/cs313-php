DROP TABLE public.task     CASCADE;
DROP TABLE public.user     CASCADE;
DROP TABLE public.category CASCADE;

CREATE EXTENSION pgcrypto;

CREATE TABLE public.user (
  user_id  SERIAL      CONSTRAINT pk_users_1 PRIMARY KEY
, username VARCHAR(30) CONSTRAINT nn_users_1 NOT NULL
                       CONSTRAINT uq_users_1 UNIQUE
, password VARCHAR(255) CONSTRAINT nn_users_2 NOT NULL
);

CREATE TABLE public.category (
  category_id SERIAL      CONSTRAINT pk_category_1 PRIMARY KEY
, title       VARCHAR(30) CONSTRAINT nn_category_1 NOT NULL
);

CREATE TABLE public.task (
  task_id     SERIAL      CONSTRAINT pk_task_1 PRIMARY KEY
, user_id     INTEGER     CONSTRAINT nn_task_1 NOT NULL
, title       VARCHAR(30) CONSTRAINT nn_task_2 NOT NULL
, category_id INTEGER
, due_date    DATE
, location    VARCHAR(30)
, priorty     VARCHAR(30)
, CONSTRAINT fk_task_1 FOREIGN KEY (user_id)     REFERENCES public.user(user_id)
, CONSTRAINT fk_task_2 FOREIGN KEY (category_id) REFERENCES public.category(category_id)
);

INSERT INTO public.user (
  username
, password)
VALUES (
  'jkalldre'
, crypt('supergoodpassword', gen_salt('bf')));

INSERT INTO public.user (
  username
, password)
VALUES (
  'stewart'
, crypt('supergoodpassword', gen_salt('bf')));


INSERT INTO public.category (title) VALUES ('Misc'  );
INSERT INTO public.category (title) VALUES ('School');
INSERT INTO public.category (title) VALUES ('Work'  );
INSERT INTO public.category (title) VALUES ('Family');

INSERT INTO public.task (
  user_id
, category_id
, title)
VALUES (
  (SELECT user_id FROM public.user WHERE username = 'jkalldre')
, (SELECT category_id FROM public.category WHERE title = 'School')
, 'Get this database set up');

INSERT INTO public.task (
  user_id
, category_id
, title)
VALUES (
  (SELECT user_id FROM public.user WHERE username = 'jkalldre')
, (SELECT category_id FROM public.category WHERE title = 'Work')
, 'Grade papers');

INSERT INTO public.task (
  user_id
, category_id
, title)
VALUES (
  (SELECT user_id FROM public.user WHERE username = 'jkalldre')
, (SELECT category_id FROM public.category WHERE title = 'Family')
, 'Tell my wife I love her.');

INSERT INTO public.task (
  user_id
, category_id
, title)
VALUES (
  (SELECT user_id FROM public.user WHERE username = 'jkalldre')
, (SELECT category_id FROM public.category WHERE title = 'Family')
, 'Pet Archie the cat.');

SELECT crypt('supergoodpassword',(select password from public.user where username='stewart'));--
SELECT password FROM public.user where username ='stewart';
-- https://www.meetspaceapp.com/2016/04/12/passwords-postgresql-pgcrypto.html
-- SELECT * FROM public.task WHERE category_id =
-- (SELECT category_id FROM public.category WHERE title = 'Family');
