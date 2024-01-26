-- Section1

SELECT 
  aircraft_code, 
  fare_conditions, 
  COUNT(seat_no) AS count
FROM 
  seats
GROUP BY 
  aircraft_code, 
  fare_conditions
ORDER BY 
  aircraft_code ASC, 
  count DESC;

-- Section2
   Your second query here
-- Section3
   Your third query here
-- Section4
   Your fourth query here