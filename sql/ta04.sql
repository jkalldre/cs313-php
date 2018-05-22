drop table ta04_note cascade;
drop table ta04_talk cascade;
drop table ta04_speaker cascade;
drop table ta04_session cascade;
drop table ta04_user cascade;


CREATE TABLE public.ta04_user (
  user_id   SERIAL       constraint  pk_user_1 PRIMARY KEY
  ,user_name VARCHAR(50)  constraint nn_user_2 NOT NULL  constraint uq_user_1 UNIQUE
  ,password  VARCHAR(255) constraint nn_user_3 NOT NULL
);

CREATE TABLE public.ta04_session (
  session_id SERIAL      constraint  pk_session_1 PRIMARY KEY
  ,year       INTEGER     constraint  nn_session_1 NOT NULL
  ,month      INTEGER     constraint  nn_session_2 NOT NULL
  ,session    VARCHAR(20) constraint  nn_session_3 NOT NULL
);

CREATE TABLE public.ta04_speaker (
  speaker_id   SERIAL       constraint  pk_speaker_1  PRIMARY KEY
  ,speaker_name VARCHAR(30)  constraint  nn_speaker_1 NOT NULL
  ,position     VARCHAR(50)
);

CREATE TABLE public.ta04_talk (
  talk_id     SERIAL      constraint pk_talk_1  PRIMARY KEY
  ,talk_name  VARCHAR(200) constraint nn_talk_1  NOT NULL
  ,session_id INTEGER     constraint nn_talk_2  NOT NULL
  ,speaker_id INTEGER     constraint nn_talk_3  NOT NULL
  ,constraint fk_talk_1 foreign key (session_id) REFERENCES public.ta04_session(session_id)
  ,constraint fk_talk_2 foreign key (speaker_id) REFERENCES public.ta04_speaker(speaker_id)
);

CREATE TABLE public.ta04_note (
  note_id    SERIAL    constraint  pk_note_1 PRIMARY KEY
  ,user_id    INTEGER  constraint  nn_note_1 NOT NULL
  ,session_id INTEGER  constraint  n_note_2 NOT NULL
  ,speaker_id INTEGER  constraint  nn_note_3 NOT NULL
  ,talk_id    INTEGER  constraint  nn_note_4 NOT NULL
  ,note       TEXT     constraint  nn_note_5 NOT NULL
  ,constraint fk_note_1 foreign key (user_id)    REFERENCES public.ta04_user(user_id)
  ,constraint fk_note_2 foreign key (session_id) REFERENCES public.ta04_session(session_id)
  ,constraint fk_note_3 foreign key (speaker_id) REFERENCES public.ta04_speaker(speaker_id)
  ,constraint fk_note_4 foreign key (talk_id)    REFERENCES public.ta04_talk(talk_id)
);



INSERT INTO public.ta04_user
  (user_name
  ,password)
  VALUES
  ('Tammy'
  ,'password'
 );

INSERT INTO public.ta04_session
  (year
  ,month
  ,session)
  VALUES
 (2018
 ,04
 ,'Saturday Morning'
);

INSERT INTO public.ta04_session
  (year
  ,month
  ,session)
  VALUES
  (2018
  ,04
  ,'Sunday Afternoon'
  );

  INSERT INTO public.ta04_session
    (year
    ,month
    ,session)
    VALUES
    (2018
    ,04
    ,'Sunday Morning'
    );

INSERT INTO public.ta04_speaker
  (speaker_name
  ,position)
  VALUES
 ('Brian K. Taylor'
  ,'Seventy'
);

INSERT INTO public.ta04_speaker
  (speaker_name
  ,position)
  VALUES
  ('Russel M. Nelson'
  ,'Prophet'
);


INSERT INTO public.ta04_talk
  (talk_name
  ,session_id
  ,speaker_id)
  VALUES
  ('Revelation for the Church, Revelation for Our Lives'
  ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Morning')
  ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
);

INSERT INTO public.ta04_talk
  (talk_name
  ,session_id
  ,speaker_id)
  VALUES
  ('Am I A Child Of God?'
  ,(SELECT session_id FROM public.ta04_session WHERE session = 'Saturday Morning')
  ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Brian K. Taylor')
);

INSERT INTO public.ta04_talk
  (talk_name
  ,session_id
  ,speaker_id)
  VALUES
  ('Let Us All Press On'
  ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Afternoon')
  ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Saturday Morning')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Brian K. Taylor')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Am I A Child Of God?')
 , 'God sanctifies the most difficult days of mothers.'
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Saturday Morning')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Brian K. Taylor')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Am I A Child Of God?')
 , 'Parents teach their children throughout their life, from first prayer, to parenting advice.'
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Morning')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Revelation for the Church, Revelation for Our Lives')
 , 'Give thanks when we receive revelation.'
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Morning')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Revelation for the Church, Revelation for Our Lives')
 , 'Stretch beyond your personal ability to receive revelation.'
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Afternoon')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Let Us All Press On')
 , 'Include conference talks in FHE over next 6 months.'
);

INSERT INTO public.ta04_note
  (user_id
  ,session_id
  ,speaker_id
  ,talk_id
  ,note)
  VALUES
 ((SELECT user_id FROM public.ta04_user WHERE user_name = 'Tammy')
 ,(SELECT session_id FROM public.ta04_session WHERE session = 'Sunday Afternoon')
 ,(SELECT speaker_id FROM public.ta04_speaker WHERE speaker_name = 'Russel M. Nelson')
 ,(SELECT talk_id FROM public.ta04_talk WHERE talk_name = 'Let Us All Press On')
 , 'Spend time in the temple.'
);

SELECT s.speaker_name AS Speaker, t.talk_name AS Talk, n.note AS Note
FROM public.ta04_note n, public.ta04_talk t, public.ta04_speaker s
WHERE s.speaker_name = 'Russel M. Nelson'
AND s.speaker_id = n.speaker_id
AND t.talk_id = n.talk_id
ORDER BY t.talk_name
;

commit;
