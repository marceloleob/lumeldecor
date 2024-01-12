@extends('site.layouts.pages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Lumel Decor</a></li>
<li class="breadcrumb-item active">Termos e Condições</li>
@endsection

@section('content')
	{{-- STAT SECTION FAQ --}}
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="term_conditions">
						<h6>Termos e Condições Lumel Decor</h6>
						<p>A Lumel Decor, com sede na Rua Úrsula Paulino, 911, Betânia, Belo Horizonte - MG, CEP: 99999-999, CNPJ: 50.571.317/0001-56, Incrição Estadual: 999.999.999, doravante denominada simplesmente Lumel Decor, e, de outro lado, o cliente Lumel Decor, qualificado no momento da compra dos Produtos Lumel Decor, doravante denominado simplesmente Cliente.</p>
						<p>Considerando que a Lumel Decor realiza venda de Produtos pela internet;</p>
						<p>Considerando o interesse do Cliente na compra dos Produtos oferecidos pela Lumel Decor ("Produtos") em seus canais de venda;</p>
						{{-- <p>O presente contrato tem por finalidade estabelecer as condições gerais de uso e compra de Produtos do cliente do site Lumel Decor (www.lumeldecor.com.br).</p> --}}
						<hr>

						<h6>I. Confidencialidade:</h6>
						<p>É de responsabilidade da Lumel Decor a preservação da confidencialidade de todos os dados e informações fornecidos pelo Cliente no processo de compra. A segurança do site é auditada e garantida contra a ação de hackers. {{-- , através do selo "Site Blindado". --}}</p>

						<h6>II. Serviço de Atendimento ao Cliente (SAC):</h6>
						<p>O cliente dispõe desse serviço para sanar suas dúvidas, solucionar eventuais solicitações ou reclamações a respeito do seu pedido ou de qualquer conteúdo disponibilizado no site. O SAC poderá ser acionado por meio de telefone ou de formulário do site ou envio de e-mail para atendimento@lumeldecor.com.br, todos disponibilizados em nossa "Central de Atendimento".</p>

						<h6>III. Política de Entrega:</h6>
						<p>O prazo para entrega dos Produtos é informado durante o procedimento de compra, contabilizado em dias úteis. As entregas dos Produtos são realizadas de segunda a sexta-feira, das 8h às 22h. Excepcionalmente, algumas entregas de Produtos podem ocorrer aos sábados, domingos e feriados.</p>
						<h6>III.I.:</h6>
						<p>A conferência da adequação das dimensões do Produto é de responsabilidade do Cliente, que deverá se assegurar de que estas estão de acordo com os limites espaciais dos elevadores, portas e corredores do local da entrega. Não será realizada a montagem ou desmontagem do Produto, transporte pela escada e/ou portas e janelas, ou içamento das entregas.</p>
						<h6>III.II.:</h6>
						<p>Serão realizadas até três tentativas de entrega no local informado, em dias alternados, com intervalo de até 48h entre uma entrega e outra. É indispensável que, no endereço solicitado, haja uma pessoa autorizada pelo comprador, maior de 18 anos, e portando documento de identificação para receber a mercadoria e assinar o protocolo de entrega. Se houver três tentativas de entrega sem sucesso, o pedido retornará para o Centro de Distribuição da Lumel Decor.</p>
						<h6>III.III.:</h6>
						<p>Após a finalização do pedido não é possível alterar a forma de pagamento e/ou endereço de entrega, solicitar adiantamento ou, ainda, prioridade da entrega.</p>
						<h6>III.IV.:</h6>
						<p>O prazo de entrega informado durante o procedimento de compra do Produto leva em consideração o estoque, a região {{-- , o processo de emissão da nota fiscal --}} e o tempo de preparo do Produto. A cada atualização no status de entrega do pedido, o sistema da Lumel Decor envia, automaticamente, e-mails de alerta para o Cliente.</p>
						<h6>III.V.:</h6>
						<p>O valor do frete da entrega é calculado com base no local de entrega, peso e dimensões do Produto.</p>
						<h6>III.VI.:</h6>
						<p>A Lumel Decor não autoriza a transportadora a:</p>
						<ul>
							<li>Entregar por meios alternativos;</li>
							<li>Realizar instalação ou manutenção de Produtos;</li>
							<li>Abrir a embalagem do Produto;</li>
							<li>Realizar a entrega em endereço diferente do que o Cliente informou;</li>
							<li>Realizar a entrega a menor de idade ou sem documento de identificação.</li>
						</ul>
						<h6>III.VII.:</h6>
						<p>A Lumel Decor não se responsabiliza pela retenção de mercadorias na SEFAZ quando esta se dever exclusivamente a pendências do cliente, sendo, portanto, necessário seu comparecimento no posto fiscal para que a mercadoria seja liberada, tendo em vista que nestes casos as informações referentes a liberações e pagamentos só são passadas aos interessados.</p>

						<h6>IV. Direito de Arrependimento:</h6>
						<p>Ao Cliente será facultado o exercício do direito de arrependimento da compra, com a finalidade de devolução do Produto, hipótese na qual deverão ser observadas as seguintes condições:</p>
						<ul>
							<li>O prazo de desistência da compra do Produto é de até 7 (sete) dias corridos, a contar da data do recebimento;</li>
							<li>Em caso de devolução, o Produto deverá ser devolvido à Lumel Decor na embalagem original, acompanhado {{-- do DANFE (Documento Auxiliar da Nota Fiscal Eletrônica), --}} do manual (caso tenha) e de todos os seus acessórios.</li>
						</ul>
						<h6>IV.I.:</h6>
						<p>O Cliente deverá solicitar a devolução através do Serviço de Atendimento ao Cliente (SAC) ou diretamente no Painel de Controle, no tópico "Cancelar Pedido". As despesas decorrentes de coleta ou postagem do Produto não serão custeadas pela Lumel Decor.</p>
						<h6>IV.II.:</h6>
						<p>Após a chegada do Produto ao Centro de Distribuição, a Lumel Decor verificará se as condições supra citadas foram atendidas. Em caso afirmativo, providenciará a restituição no valor parcial de 80% da compra.</p>
						<h6>IV.III.:</h6>
						<p>Em compras com cartão de crédito a administradora do cartão será notificada e o estorno ocorrerá na fatura seguinte ou na posterior, de uma só vez, seja qual for o número de parcelas utilizado na compra. O prazo de ressarcimento e, ainda, a cobrança das parcelas remanescentes após o estorno integral do valor do Produto no cartão de crédito do Cliente realizado pela Lumel Decor, é de responsabilidade da administradora do cartão. Na hipótese de cobrança de parcelas futuras pela administradora do cartão, o Cliente não será onerado, vez que a Lumel Decor, conforme mencionado acima, realiza o estorno do valor parcial de 80% do Produto em uma única vez, sendo o crédito referente ao estorno concedido integralmente pela administradora do cartão na fatura de cobrança subsequente ao mês do cancelamento.</p>
						<h6>IV.IV.:</h6>
						<p>Em compras pagas com boleto bancário ou débito em conta, a restituição será efetuada por meio de depósito bancário, em até 10 (dez) dias úteis, somente na conta corrente do(a) comprador(a), que deve ser individual. É necessário que o CPF do titular da conta corrente seja o mesmo que consta no pedido (CPF do Cliente). Caso o(a) comprador(a) não tenha uma conta corrente que atenda às condições citadas, será enviada, no mesmo prazo, uma Ordem de Pagamento em nome do titular da compra. Ela poderá ser resgatada em qualquer agência do Banco <b>QUE BANCO?</b>, mediante apresentação de documento de identidade e CPF.</p>
						<h6>IV.V.:</h6>
						<p>Em compras com utilização de Cupons de desconto, o valor do cupom não será retornado ao Cliente.</p>
						<h6>IV.VI.:</h6>
						<p>A Lumel Decor isenta-se da obrigação de cancelar qualquer produto que não preencha os requisitos elencados neste dispositivo.</p>

						<h6>V. Formas de Pagamentos Aceitas:</h6>
						<h6>V.I.:</h6>
						<p>Pagamento à vista:</p>
						<ul>
							<li>Boleto Bancário;</li>
							<li>Débito em Conta;</li>
							<li>Cartão de Crédito (em breve).</li>
						</ul>
						<h6>V.II.:</h6>
						<p>Pagamento parcelado:</p>
						<ul>
							<li>Cartão de Crédito (em breve).</li>
						</ul>
						<h6>V.III.:</h6>
						<p>Para pagamentos com cartão de crédito, o pedido estará sujeito à aprovação da administradora do cartão. As informações contidas no cadastro são passíveis de confirmação, que poderá ser solicitada pela Lumel Decor por e-mail.</p>

						<h6>VI. Prazos de entrega e Forma de pagamento:</h6>
						<h6>VI.I.:</h6>
						<p>Compras pagas com Cartão de Crédito: o prazo para entrega é considerado a partir da checagem de dados cadastrais e da confirmação do pagamento pela administradora do cartão. A confirmação é realizada em até um dois dias corridos. Em caso de divergência cadastral, a Lumel Decor entrará em contato com o comprador.</p>
						<h6>VI.II.:</h6>
						<p>Compras pagas por meio de Boleto Bancário: o prazo para entrega é considerado a partir da confirmação do pagamento pelo Banco. A confirmação é realizada em até três dias úteis, a partir do pagamento.</p>
						<h6>VI.III.:</h6>
						<p>Compras pagas por meio de Débito em Conta: o prazo para entrega é considerado a partir da confirmação do pagamento pelo Banco. A confirmação é realizada em até dois dias corridos.</p>

						<h6>VII. Ofertas:</h6>
						<p>As Ofertas podem ser encontradas na página principal do site da Lumel Decor. Porém, uma oferta pode ser retirada do site quando os Produtos em estoque estiverem esgotados e não for possível efetuar a reposição com nossos Fornecedores.</p>
						<h6>VII.I.:</h6>
						<p>O Cliente deve ler atentamente o regulamento de cada oferta antes de fechar a compra. Em caso de dúvida, o cliente deverá entrar em contato com o nosso Setor de Atendimento ao Cliente (SAC).</p>

						<h6>VIII. Característica dos Produtos e Risco à Saúde:</h6>
						<p>Antes de comprar um produto, o Cliente deve ler atentamente em sua página a descrição do uso e manuseio, bem como a indicação de faixa etária. Em caso de dúvida, deverá contatar o Setor de Atendimento ao Cliente (SAC).</p>

						<h6>IX. Caso Fortuito e Força Maior:</h6>
						<p>Nenhuma das partes será responsável perante a outra por qualquer falha ou atraso no cumprimento das obrigações constantes do presente contrato causados por casos fortuitos ou força maior.</p>

						<h6>X. Foro:</h6>
						<p>Fica eleito o foro de domicílio do Cliente para dirimir eventuais controvérsias a respeito deste contrato.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SECTION FAQ --}}
@endsection
