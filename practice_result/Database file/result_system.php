use kowshik;
CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `username` varchar(100) NOT NULL,
      `email` varchar(100) NOT NULL,
      `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table result(id int primary key ,
level_term varchar(255),
name varchar(255),
roll int,
a_i int,
 m_a int,
network int,
e_s int,
 o_s int,
a_i_s int,
 network_s int,
 e_s_s int,
 o_s_s int,
 attendance int,
total int,
grade varchar(255));