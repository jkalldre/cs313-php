--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3 (Ubuntu 10.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.category (
    category_id integer NOT NULL,
    title character varying(30) NOT NULL
);


ALTER TABLE public.category OWNER TO pwhfjbtdlbjnxq;

--
-- Name: category_category_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.category_category_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_category_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: category_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.category_category_id_seq OWNED BY public.category.category_id;


--
-- Name: ta04_note; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.ta04_note (
    note_id integer NOT NULL,
    user_id integer NOT NULL,
    session_id integer NOT NULL,
    speaker_id integer NOT NULL,
    talk_id integer NOT NULL,
    note text NOT NULL
);


ALTER TABLE public.ta04_note OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_note_note_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.ta04_note_note_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ta04_note_note_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_note_note_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.ta04_note_note_id_seq OWNED BY public.ta04_note.note_id;


--
-- Name: ta04_session; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.ta04_session (
    session_id integer NOT NULL,
    year integer NOT NULL,
    month integer NOT NULL,
    session character varying(20) NOT NULL
);


ALTER TABLE public.ta04_session OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_session_session_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.ta04_session_session_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ta04_session_session_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_session_session_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.ta04_session_session_id_seq OWNED BY public.ta04_session.session_id;


--
-- Name: ta04_speaker; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.ta04_speaker (
    speaker_id integer NOT NULL,
    speaker_name character varying(30) NOT NULL,
    "position" character varying(50)
);


ALTER TABLE public.ta04_speaker OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_speaker_speaker_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.ta04_speaker_speaker_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ta04_speaker_speaker_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_speaker_speaker_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.ta04_speaker_speaker_id_seq OWNED BY public.ta04_speaker.speaker_id;


--
-- Name: ta04_talk; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.ta04_talk (
    talk_id integer NOT NULL,
    talk_name character varying(200) NOT NULL,
    session_id integer NOT NULL,
    speaker_id integer NOT NULL
);


ALTER TABLE public.ta04_talk OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_talk_talk_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.ta04_talk_talk_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ta04_talk_talk_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_talk_talk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.ta04_talk_talk_id_seq OWNED BY public.ta04_talk.talk_id;


--
-- Name: ta04_user; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.ta04_user (
    user_id integer NOT NULL,
    user_name character varying(50) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.ta04_user OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.ta04_user_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ta04_user_user_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: ta04_user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.ta04_user_user_id_seq OWNED BY public.ta04_user.user_id;


--
-- Name: task; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public.task (
    task_id integer NOT NULL,
    user_id integer NOT NULL,
    title character varying(30) NOT NULL,
    category_id integer,
    due_date date,
    location character varying(30),
    priorty character varying(30)
);


ALTER TABLE public.task OWNER TO pwhfjbtdlbjnxq;

--
-- Name: task_task_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.task_task_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.task_task_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: task_task_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.task_task_id_seq OWNED BY public.task.task_id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE TABLE public."user" (
    user_id integer NOT NULL,
    username character varying(30) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public."user" OWNER TO pwhfjbtdlbjnxq;

--
-- Name: user_user_id_seq; Type: SEQUENCE; Schema: public; Owner: pwhfjbtdlbjnxq
--

CREATE SEQUENCE public.user_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_user_id_seq OWNER TO pwhfjbtdlbjnxq;

--
-- Name: user_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER SEQUENCE public.user_user_id_seq OWNED BY public."user".user_id;


--
-- Name: category category_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.category ALTER COLUMN category_id SET DEFAULT nextval('public.category_category_id_seq'::regclass);


--
-- Name: ta04_note note_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note ALTER COLUMN note_id SET DEFAULT nextval('public.ta04_note_note_id_seq'::regclass);


--
-- Name: ta04_session session_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_session ALTER COLUMN session_id SET DEFAULT nextval('public.ta04_session_session_id_seq'::regclass);


--
-- Name: ta04_speaker speaker_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_speaker ALTER COLUMN speaker_id SET DEFAULT nextval('public.ta04_speaker_speaker_id_seq'::regclass);


--
-- Name: ta04_talk talk_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_talk ALTER COLUMN talk_id SET DEFAULT nextval('public.ta04_talk_talk_id_seq'::regclass);


--
-- Name: ta04_user user_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_user ALTER COLUMN user_id SET DEFAULT nextval('public.ta04_user_user_id_seq'::regclass);


--
-- Name: task task_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.task ALTER COLUMN task_id SET DEFAULT nextval('public.task_task_id_seq'::regclass);


--
-- Name: user user_id; Type: DEFAULT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public."user" ALTER COLUMN user_id SET DEFAULT nextval('public.user_user_id_seq'::regclass);


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.category (category_id, title) FROM stdin;
1	Misc
2	School
3	Work
4	Family
5	Test
6	Cake
7	test
8	Home
9	
10	Cat
11	Caat
12	Pet
13	Food
14	Tst
15	Life
16	Church
17	Administration
18	Important
19	Fun
20	Funtimes
\.


--
-- Data for Name: ta04_note; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.ta04_note (note_id, user_id, session_id, speaker_id, talk_id, note) FROM stdin;
1	1	1	1	2	God sanctifies the most difficult days of mothers.
2	1	1	1	2	Parents teach their children throughout their life, from first prayer, to parenting advice.
3	1	3	2	1	Give thanks when we receive revelation.
4	1	3	2	1	Stretch beyond your personal ability to receive revelation.
5	1	2	2	3	Include conference talks in FHE over next 6 months.
6	1	2	2	3	Spend time in the temple.
\.


--
-- Data for Name: ta04_session; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.ta04_session (session_id, year, month, session) FROM stdin;
1	2018	4	Saturday Morning
2	2018	4	Sunday Afternoon
3	2018	4	Sunday Morning
\.


--
-- Data for Name: ta04_speaker; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.ta04_speaker (speaker_id, speaker_name, "position") FROM stdin;
1	Brian K. Taylor	Seventy
2	Russel M. Nelson	Prophet
\.


--
-- Data for Name: ta04_talk; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.ta04_talk (talk_id, talk_name, session_id, speaker_id) FROM stdin;
1	Revelation for the Church, Revelation for Our Lives	3	2
2	Am I A Child Of God?	1	1
3	Let Us All Press On	2	2
\.


--
-- Data for Name: ta04_user; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.ta04_user (user_id, user_name, password) FROM stdin;
1	Tammy	password
\.


--
-- Data for Name: task; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public.task (task_id, user_id, title, category_id, due_date, location, priorty) FROM stdin;
61	4	Read scriptures	16	\N	\N	\N
62	4	Preach gospel	16	\N	\N	\N
63	5	Admin stuff	17	\N	\N	\N
21	1	Take out trash	4	2017-01-21	\N	\N
66	5	task	5	2018-06-05	\N	\N
64	5	Tester	5	2018-06-07	\N	\N
67	1	Wash Dishes SOON	4	2018-05-30	\N	\N
68	1	Hike Mountain	20	2018-06-01	\N	\N
19	2	CS 313 Homework	2	\N	\N	\N
28	2	Walk the dog	12	1994-01-18	\N	\N
29	2	Cook dinner	13	1994-01-18	\N	\N
30	2	Meal Prep	13	1994-01-18	\N	\N
41	1	Get Database working	2	2018-06-02	\N	\N
43	1	Zoo visit	4	2018-06-16	\N	\N
4	1	Pet Archie the cat.	4	2018-05-29	\N	\N
60	1	Achieve Goals	15	\N	\N	\N
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: pwhfjbtdlbjnxq
--

COPY public."user" (user_id, username, password) FROM stdin;
1	jkalldre	$2a$06$P.7fs470yACf18cuGfNUQOT7Zu4NMJzYU.09bhQplVGxPWuEIB6he
2	stewart	$2a$06$TpQBaysbZo94yNRFSOvtFu2.6maurThcd0LJCJgntS26j8OlIG6AS
4	nephi	$2a$06$SFKgN5KewPRrv5mrzdFwc.ZT9vA2T48QIwDhBRvHdh3BFx0Q44lay
5	admin	$2a$06$Qqxu8F2cNxztCDdQwCzX7Ox2LjwgTA6yXH0VNjS/G.7Mbl9GtFWtC
6	Test	$2a$06$tA6qPZquJCz2hG.F08nF.uB8wY2lxhGHqrn98XjZTCXNz7bNi2Zse
\.


--
-- Name: category_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.category_category_id_seq', 20, true);


--
-- Name: ta04_note_note_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.ta04_note_note_id_seq', 6, true);


--
-- Name: ta04_session_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.ta04_session_session_id_seq', 3, true);


--
-- Name: ta04_speaker_speaker_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.ta04_speaker_speaker_id_seq', 2, true);


--
-- Name: ta04_talk_talk_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.ta04_talk_talk_id_seq', 3, true);


--
-- Name: ta04_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.ta04_user_user_id_seq', 1, true);


--
-- Name: task_task_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.task_task_id_seq', 70, true);


--
-- Name: user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: pwhfjbtdlbjnxq
--

SELECT pg_catalog.setval('public.user_user_id_seq', 8, true);


--
-- Name: category pk_category_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT pk_category_1 PRIMARY KEY (category_id);


--
-- Name: ta04_note pk_note_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note
    ADD CONSTRAINT pk_note_1 PRIMARY KEY (note_id);


--
-- Name: ta04_session pk_session_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_session
    ADD CONSTRAINT pk_session_1 PRIMARY KEY (session_id);


--
-- Name: ta04_speaker pk_speaker_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_speaker
    ADD CONSTRAINT pk_speaker_1 PRIMARY KEY (speaker_id);


--
-- Name: ta04_talk pk_talk_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_talk
    ADD CONSTRAINT pk_talk_1 PRIMARY KEY (talk_id);


--
-- Name: task pk_task_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT pk_task_1 PRIMARY KEY (task_id);


--
-- Name: ta04_user pk_user_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_user
    ADD CONSTRAINT pk_user_1 PRIMARY KEY (user_id);


--
-- Name: user pk_users_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT pk_users_1 PRIMARY KEY (user_id);


--
-- Name: ta04_user uq_user_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_user
    ADD CONSTRAINT uq_user_1 UNIQUE (user_name);


--
-- Name: user uq_users_1; Type: CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT uq_users_1 UNIQUE (username);


--
-- Name: ta04_note fk_note_1; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note
    ADD CONSTRAINT fk_note_1 FOREIGN KEY (user_id) REFERENCES public.ta04_user(user_id);


--
-- Name: ta04_note fk_note_2; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note
    ADD CONSTRAINT fk_note_2 FOREIGN KEY (session_id) REFERENCES public.ta04_session(session_id);


--
-- Name: ta04_note fk_note_3; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note
    ADD CONSTRAINT fk_note_3 FOREIGN KEY (speaker_id) REFERENCES public.ta04_speaker(speaker_id);


--
-- Name: ta04_note fk_note_4; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_note
    ADD CONSTRAINT fk_note_4 FOREIGN KEY (talk_id) REFERENCES public.ta04_talk(talk_id);


--
-- Name: ta04_talk fk_talk_1; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_talk
    ADD CONSTRAINT fk_talk_1 FOREIGN KEY (session_id) REFERENCES public.ta04_session(session_id);


--
-- Name: ta04_talk fk_talk_2; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.ta04_talk
    ADD CONSTRAINT fk_talk_2 FOREIGN KEY (speaker_id) REFERENCES public.ta04_speaker(speaker_id);


--
-- Name: task fk_task_1; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT fk_task_1 FOREIGN KEY (user_id) REFERENCES public."user"(user_id);


--
-- Name: task fk_task_2; Type: FK CONSTRAINT; Schema: public; Owner: pwhfjbtdlbjnxq
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT fk_task_2 FOREIGN KEY (category_id) REFERENCES public.category(category_id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: pwhfjbtdlbjnxq
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO pwhfjbtdlbjnxq;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO pwhfjbtdlbjnxq;


--
-- PostgreSQL database dump complete
--

