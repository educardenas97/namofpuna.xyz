SELECT COUNT(carrera.car_codigo),carrera.car_detalle FROM carrera
INNER JOIN (participante,actividad,persona,asistencia)
ON (participante.par_codigo=asistencia.par_codigo
  AND actividad.act_codigo=asistencia.act_codigo
  AND persona.per_codigo=participante.per_codigo
  AND persona.tp_codigo<>2
  AND actividad.act_codigo=2
  AND persona.car_codigo=carrera.car_codigo)
GROUP BY (carrera.car_codigo)
ORDER BY (carrera.car_codigo) ASC
