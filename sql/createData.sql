SET search_path = Pharmacy;

INSERT INTO Secretary VALUES (DEFAULT, 'BB', '8', 'Desert, Jakku', '444-444-4444'); -- 1
INSERT INTO Secretary VALUES (DEFAULT, 'C', '3PO', 'Tatooine', '222-222-2222'); -- 2

INSERT INTO Doctor VALUES (DEFAULT, 'Han', 'Solo', 'Cockpit, Millenium Falcon', 'Han shot first', 'Womanizing', 2); -- 1
INSERT INTO Doctor VALUES (DEFAULT, 'Chewbacca', 'Wookie', 'Passenger seat, Millenium Falcon', 'Rrrrrrr-ghghghghgh!', 'Veterinary Medicine', 1); -- 2
INSERT INTO Doctor VALUES (DEFAULT, 'Darth', 'Vader', 'Room 616, 31st Floor, Death Star', '616-616-6666', 'Transhumanism', 1); -- 3

INSERT INTO Patient VALUES (DEFAULT, 'Luke', 'Skywalker', DATE'2981-01-27', 'Moisture Farm, Tatooine', '616-616-6666', 'M', '123456789'); -- 1
INSERT INTO Patient VALUES (DEFAULT, 'Anakin', 'Skywalker', DATE'2958-08-12', 'Jedi Temple, Coruscant', '616-616-6666', 'M', '1212'); -- 2
INSERT INTO Patient VALUES (DEFAULT, 'Leia', 'Organa', DATE'2981-01-27', 'Citadel, Naboo', '616-616-6666', 'F', '123'); -- 3

INSERT INTO Appointment VALUES (DEFAULT, '3000-01-01 17:30', '3000-01-01 19:00', '', 1, 1);
INSERT INTO Appointment VALUES (DEFAULT, '3000-01-01 19:00', '3000-01-01 21:30', '', 2, 1);
INSERT INTO Appointment VALUES (DEFAULT, '3000-01-01 17:30', '3000-01-01 19:00', '', 3, 2);
INSERT INTO Appointment VALUES (DEFAULT, '3000-01-01 18:00', '3000-01-01 20:00', '', 3, 1);

-- Find appointments that conflict with a given appointment
-- select * from Appointment A
--     join Appointment B
--     on (A.date < B.endDate AND A.endDate > B.date AND A.doctor = B.doctor AND A.id != B.id)
--     where A.id = 5;

INSERT INTO Drug VALUES (DEFAULT, 'Tauntaun serum', 500, 'Tauntaun Serum Albumin', FALSE); -- 1
INSERT INTO Drug VALUES (DEFAULT, 'TSA', 200, 'Tauntaun Serum Albumin', TRUE); -- 2
INSERT INTO Drug VALUES (DEFAULT, 'Jakkufluxazol', 200, 'ARVT', FALSE); -- 3
INSERT INTO Drug VALUES (DEFAULT, 'ARVT USP', 200, 'ARVT', TRUE); -- 4
INSERT INTO Drug VALUES (DEFAULT, 'Light Side in a Tablet', 200, 'Fluoroziphil', FALSE); -- 5
INSERT INTO Drug VALUES (DEFAULT, 'Paratelomen', 200, 'Sodium Acetocarbonate Midicide', FALSE); -- 6
INSERT INTO Drug VALUES (DEFAULT, 'MCPEG5 HeAL', 200, 'MCPEG5 Wild Gene', FALSE); -- 7

INSERT INTO Pathology VALUES (DEFAULT, 'Hyposerothermia'); -- 1
INSERT INTO Pathology VALUES (DEFAULT, 'Tatooine Flu'); -- 2
INSERT INTO Pathology VALUES (DEFAULT, 'Acute Dark Side Affinity Syndrome'); -- 3
INSERT INTO Pathology VALUES (DEFAULT, 'Autocatastrophic Force Disorder'); -- 4
INSERT INTO Pathology VALUES (DEFAULT, 'Midichlorian Cancer'); -- 5

INSERT INTO DrugConflict VALUES (DEFAULT, 'Tauntaun Serum Albumin', 'Fluoroziphil');
INSERT INTO DrugConflict VALUES (DEFAULT, 'ARVT', 'MCPEG5 Wild Gene');

INSERT INTO DrugPathologyConflict VALUES (DEFAULT, 'Fluoroziphil', 4);
INSERT INTO DrugPathologyConflict VALUES (DEFAULT, 'MCPEG5 Wild Gene', 3);
INSERT INTO DrugPathologyConflict VALUES (DEFAULT, 'MCPEG5 Wild Gene', 4);
INSERT INTO DrugPathologyConflict VALUES (DEFAULT, 'ARVT', 2);

INSERT INTO DrugScript VALUES (DEFAULT, 1, 1, 1, '2016-01-01', 30);
