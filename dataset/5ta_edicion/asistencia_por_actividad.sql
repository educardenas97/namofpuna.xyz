SELECT COUNT(asistencia.par_codigo) FROM asistencia INNER JOIN (participante,actividad,persona) ON
  (participante.par_codigo=asistencia.par_codigo AND
  actividad.act_codigo=asistencia.act_codigo AND
  persona.per_codigo=participante.per_codigo AND
  persona.tp_codigo<>2)
  GROUP BY (asistencia.act_codigo)
  ORDER BY (asistencia.act_codigo) ASC
  /*Codigo para contar las personas quze participaron en cada actividad*/
