SELECT COUNT(participante.par_codigo) FROM asistencia,actividad,participante,persona
WHERE (asistencia.act_codigo=2 or asistencia.act_codigo=4 or asistencia.act_codigo=5 or actividad.act_codigo=6)
AND participante.par_codigo=asistencia.par_codigo
AND asistencia.act_codigo=actividad.act_codigo
AND participante.par_codigo=persona.per_codigo
AND (persona.tp_codigo=1 OR persona.tp_codigo=3)
AND participante.edi_codigo=5
GROUP BY (asistencia.act_codigo)
ORDER BY (asistencia.act_codigo) ASC
