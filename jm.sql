#http://stackoverflow.com/questions/4729406/mysql-returning-the-top-5-of-each-category

SELECT cat_name, name
FROM
(
    SELECT m.name as cat_name, s.name,
        @r:=case when @g=m.name then @r+1 else 1 end r,
        @g:=m.name
    FROM (select @g:=null,@r:=0) n
    cross join project_category m 
    left join project s on m.cat_id = s.cat_id
    where m.father_id <>0  AND m.name <> '其他'
) X
WHERE r <= 5