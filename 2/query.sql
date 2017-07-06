SELECT * FROM data
LEFT JOIN link ON link.data_id = data.id
LEFT JOIN info ON link.info_id = info.id