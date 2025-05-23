function initDynamicModules() {
  /*
  Importar arquivos JS em formato de chunks, sob-demanda

  Como usar:
  - selector: o seletor jQuery existente em qualquer página
  - modulePath: caminho relativo ao módulo (arquivo javascript) a ser incluído
  - moduleFunction: a função exportada pelo módulo

  Importante:
  - O módulo deve exportar dentro de um objeto, como `export { funcName }`
  - Cada módulo pode importar outros módulos diretamente com `import {funcName} from ../relative-path/module.js`

  TODO:
  - Limpar as chamadas não utilizadas, apenas por seletor do styleguide. Manter para quando é realmente utilizado
  */

  async function loadDynamicModule(selector, modulePath, moduleFunction) {
    const elements = $(selector);
    if (elements.length > 0) {
      try {
        const module = await import(`${modulePath}`);
        module[moduleFunction]();
      } catch (error) {
        // eslint-disable-next-line no-console
        console.error(`Erro ao carregar/executar o módulo ${selector}: `, error);
      }
    }
  }

  const dynamicModules = [
    {
      selector: '.page-template-homepage',
      modulePath: './pages/home/homepage.js',
      moduleFunction: 'initPage',
    },
    {
      selector: '.page-template-credito-caixa-associativo',
      modulePath: './pages/credito-caixa-associativo/credito-caixa-associativo.js',
      moduleFunction: 'initCredito',
    },
    {
      selector: '.page-template-jeito-due',
      modulePath: './pages/jeito-due/jeito-due.js',
      moduleFunction: 'initJeitoDUE',
    },
    {
      selector: '.page-template-iniciativas',
      modulePath: './pages/iniciativas/iniciativas.js',
      moduleFunction: 'initIniciativas',
    },
    {
      selector: 'body',
      modulePath: './base/header.js',
      moduleFunction: 'initHeader',
    },
    {
      selector: 'body',
      modulePath: './base/footer.js',
      moduleFunction: 'initFooter',
    },
    {
      selector: '#invistaSwiper',
      modulePath: './base/invista.js',
      moduleFunction: 'initInvista',
    },
    {
      selector: 'body',
      modulePath: './base/modal-video.js',
      moduleFunction: 'initModal',
    },
    {
      selector: '.aba-empreendimentos',
      modulePath: './pages/empreendimento/empreendimento.js',
      moduleFunction: 'initEmpreendimento',
    },
    {
      selector: '.single-empre_single_page',
      modulePath: './pages/singles/single-empreendimentos.js',
      moduleFunction: 'initSingleEmpreendimentos',
    },
    {
      selector: '.aba-tipologias',
      modulePath: './pages/tipologia/tipologia.js',
      moduleFunction: 'initTipologia',
    },
    {
      selector: '.single-tipo_single_page',
      modulePath: './pages/singles/single-tipologia.js',
      moduleFunction: 'initSingleTipologia',
    },
    {
      selector: '.page-empreendimentos-tipologia',
      modulePath: './components/tab-toggle.js',
      moduleFunction: 'initTabToggle',
    },
    {
      selector: '#realizamos-sonho',
      modulePath: './base/realizamos-sonhos.js',
      moduleFunction: 'initRealizamos',
    },
    {
      selector: '.page-template-select',
      modulePath: './pages/select/select.js',
      moduleFunction: 'initSelect',
    },
    {
      selector: '.page-template-single-iniciativas',
      modulePath: './pages/iniciativas/single-inciativas.js',
      moduleFunction: 'initPage',
    },
    {
      selector: '.page-template-simulador',
      modulePath: './pages/simulador/simulador.js',
      moduleFunction: 'initSimulador',
    },
  ];

  dynamicModules.forEach(({selector, modulePath, moduleFunction}) => {
    loadDynamicModule(selector, modulePath, moduleFunction);
  });
}

export {initDynamicModules};
