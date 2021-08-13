insert into `user_statuses` values (1, 'Active'), (2, 'Awaiting'), (3, 'Inactive');
insert into `roles` values (1, 'Group Admin', 1);
insert into `roles` values (2, 'Application Admin', 2);
insert into `reservation_types` values (1, 'Reservation'), (2, 'Blackout');
insert into `reservation_statuses` values (1, 'Created'), (2, 'Deleted'), (3, 'Pending');

insert into `layouts` values (1, 'Europe/London',0);

insert into `time_blocks` (`availability_code`, `layout_id`, `start_time`, `end_time`) values
(1, 1, '08:00', '11:00'),
(1, 1, '11:30', '14:30'),
(1, 1, '15:00', '18:00'),
(1, 1, '18:30', '21:30'),
(1, 1, '22:00', '01:00'),
(1, 1, '18:00', '00:00');

insert into `schedules` (`schedule_id`, `name`, `isdefault`, `weekdaystart`, `layout_id`) values (1, 'Default', 1, 0, 1);

insert into `roles` values (3, 'Resource Admin', 3);

insert into `roles` values (4, 'Schedule Admin', 4);


insert into `payment_configuration` (`credit_cost`, `credit_currency`) values(0, 'USD');

