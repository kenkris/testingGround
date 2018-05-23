
/*
Update a table with data from another table. There could
potentially be multiple hits in the user table
*/
UPDATE sd
SET sd.CrtDate = minUser.FirstCrt
FROM SomeData sd
INNER JOIN (
	SELECT
		MIN(umin.CrtDate) AS FirstCrt,
		umin.sdId
	FROM users umin
	GROUP BY umin.sdId
) minUser ON minUser.sdId = sd.Id
WHERE sd.CrtDate IS NULL

/*
Update a table with data from same table. 
Here we find the first prev row that has data
*/
UPDATE sd
SET sd.CrtDate = prevSd.PrevCrt
FROM SomeData sd
CROSS APPLY(
	SELECT MAX(CrtDate) AS PrevCrt
	FROM SomeData
	WHERE Id < sd.Id
) AS prevSd
WHERE sd.CrtDate IS NULL
