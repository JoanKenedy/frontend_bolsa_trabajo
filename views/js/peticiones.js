const urlBase = "http://bolsa_de_trabajo.com/";

const obtenerCurriculumPersonal = (id_usuario) => {
  axios
    .get(
      ` ${urlBase}relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=${id_usuario}`
    )
    .then((respuesta) => console.log(respuesta.data))
    .catch((error) => console.log(error));
};

obtenerCurriculumPersonal();
