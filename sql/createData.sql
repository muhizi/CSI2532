SET search_path = Pharmacy;

INSERT INTO Doctor VALUES ('Han', 'Solo', 'Cockpit, Millenium Falcon', 'Han shot first', 'Womanizing'); -- 1
INSERT INTO Doctor VALUES ('Chewbacca', 'Wookie', 'Passenger seat, Millenium Falcon', 'Rrrrrrr-ghghghghgh!', 'Veterinary Medicine'); -- 2
INSERT INTO Doctor VALUES ('Darth', 'Vader', 'Room 616, 31st Floor, Death Star', '616-616-6666', 'Transhumanism'); -- 3

INSERT INTO Patient VALUES ('Luke', 'Skywalker', DATE'2981-01-27', 'Moisture Farm, Tatooine', '616-616-6666', 'M', '123456789'); -- 1
INSERT INTO Patient VALUES ('Anakin', 'Skywalker', DATE'2958-08-12', 'Jedi Temple, Coruscant', '616-616-6666', 'M', '1212'); -- 2
INSERT INTO Patient VALUES ('Leia', 'Organa', DATE'2981-01-27', 'Citadel, Naboo', '616-616-6666', 'F', '123'); -- 3

INSERT INTO Appointment VALUES ('3000-01-01 17:30', '3000-01-01 19:00', '', 1, 1);
INSERT INTO Appointment VALUES ('3000-01-01 19:00', '3000-01-01 21:30', '', 2, 1);
INSERT INTO Appointment VALUES ('3000-01-01 17:30', '3000-01-01 19:00', '', 3, 2);
INSERT INTO Appointment VALUES ('3000-01-01 18:00', '3000-01-01 20:00', '', 3, 1);

-- Find appointments that conflict with a given appointment
-- select * from Appointment A
--     join Appointment B
--     on (A.date < B.endDate AND A.endDate > B.date AND A.doctor = B.doctor AND A.id != B.id)
--     where A.id = 5;

INSERT INTO Drug VALUES ('Tauntaun serum', 500, 'Tauntaun Serum Albumin', FALSE); -- 1
INSERT INTO Drug VALUES ('TSA', 200, 'Tauntaun Serum Albumin', TRUE); -- 2
INSERT INTO Drug VALUES ('Jakkufluxazol', 200, 'ARVT', FALSE); -- 3
INSERT INTO Drug VALUES ('ARVT USP', 200, 'ARVT', True); -- 4
INSERT INTO Drug VALUES ('Light Side in a Tablet', 200, 'Fluoroziphil', FALSE); -- 5
INSERT INTO Drug VALUES ('Paratelomen', 200, 'Sodium Acetocarbonate Midicide', FALSE); -- 6
INSERT INTO Drug VALUES ('MCPEG5 HeAL', 200, 'MCPEG5 Wild Gene', FALSE); -- 7

INSERT INTO Pathology VALUES ('Hyposerothermia'); -- 1
INSERT INTO Pathology VALUES ('Tatooine Flu'); -- 2
INSERT INTO Pathology VALUES ('Acute Dark Side Affinity Syndrome'); -- 3
INSERT INTO Pathology VALUES ('Autocatastrophic Force Disorder'); -- 4
INSERT INTO Pathology VALUES ('Midichlorian Cancer'); -- 5

INSERT INTO DrugConflict VALUES ('Tauntaun Serum Albumin', 'Fluoroziphil');
INSERT INTO DrugConflict VALUES ('ARVT', 'MCPEG5 Wild Gene');

INSERT INTO DrugPathologyConflict VALUES ('Fluoroziphil', 4);
INSERT INTO DrugPathologyConflict VALUES ('MCPEG5 Wild Gene', 3);
INSERT INTO DrugPathologyConflict VALUES ('MCPEG5 Wild Gene', 4);
INSERT INTO DrugPathologyConflict VALUES ('ARVT', 2);
