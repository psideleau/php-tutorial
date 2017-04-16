1)Provide a list (association name, company name, domain) of all active primary
supercharged domains belonging to the Basement Systems, Inc. association.

select a.name association_name, c.name company_name, d.domain from companies C
inner join sites s on s.company = c.id
inner join associations a on a.id = s.association
inner join domains d on d.site = s.id
where c.is_on_hold = 0 and c.is_deleted = 0
and s.is_supercharged = 1
and s.is_deleted = 0 and d.is_deleted = 0
and d.is_primary = 1
and a.name = 'Basement Systems, Inc.';

+------------------------+--------------------------------------+------------+
| association_name       | company_name                         | domain     |
+------------------------+--------------------------------------+------------+
| Basement Systems, Inc. | Scelerisque Lorem Ipsum Incorporated | aliquam.ca |
+------------------------+--------------------------------------+------------+
1 row in set (0.07 sec)




2) Provide a list (association name, company name, site name) of all active sites that do
not​have a domain.
select a.name assoication_name, c.name company_name, s.name site_name from companies C
inner join sites s on s.company = c.id
inner join associations a on a.id = s.association
where c.is_on_hold = 0 and c.is_deleted = 0
and s.is_deleted = 0
and not exists (select 1 from domains d where d.site = s.id);

+--------------------------------+---------------------------------------+------------+
| assoication_name               | company_name                          | site_name  |
+--------------------------------+---------------------------------------+------------+
| Total Basement Finishing, Inc. | Odio Phasellus Ltd                    | Oregon     |
| Basement Systems, Inc.         | Vel Company                           | Washington |
| Dr. Energy Saver, LLC          | Semper Nam Ltd                        | Washington |
| CleanSpace                     | Purus Nullam Scelerisque Incorporated | Alabama    |
| Total Basement Finishing, Inc. | Cras Interdum Inc.                    | Missouri   |
| Total Basement Finishing, Inc. | Accumsan Ltd                          | Wisconsin  |
| Foundation Supportworks, Inc.  | Accumsan Ltd                          | Minnesota  |
| Basement Systems, Inc.         | Pede Nonummy Associates               | Montana    |
| Foundation Supportworks, Inc.  | Odio LLC                              | Tennessee  |
| CleanSpace                     | Odio LLC                              | Kentucky   |
| Foundation Supportworks, Inc.  | Dolor Sit Foundation                  | Vermont    |
| Basement Systems, Inc.         | Diam Inc.                             | Nebraska   |
+--------------------------------+---------------------------------------+------------+


3) Provide a list (site id, site name) of distinct active sites who have one or more domain,
and whose domains are all​deleted
select s.id, s.name from companies C
inner join sites s on s.company = c.id
inner join associations a on a.id = s.association
where c.is_on_hold = 0 and c.is_deleted = 0
and s.is_deleted = 0
and exists(select 1 from domains d where d.site = s.id)
and not exists (select 1 from domains d where d.site = s.id and d.is_deleted = 0);

+----+------------+
| id | name       |
+----+------------+
| 62 | Wyoming    |
| 83 | Nevada     |
| 53 | Washington |
| 31 | Wisconsin  |
| 87 | Florida    |
| 96 | Indiana    |
+----+------------+

