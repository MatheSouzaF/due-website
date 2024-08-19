async function getEmpreendimentos() {
  const url = '/wp-json/empreendimentos/v1/all';

  try {
    const response = await fetch(url, { method: "GET" });
    const data = await response.json();
    return data; 
  } catch (error) {
    console.error('Ocorreu um erro ao obter os empreendimentos', error);
  }
}

export { getEmpreendimentos };
