import React from 'react';
import { Link } from '@inertiajs/react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export default function Footer() {
  return (
    <>
      {/* Main Footer */}
      <div className="bg-gray-100 py-12">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            {/* Logo */}
            <div className="text-center md:text-left">
              <Link href="/" className="inline-block">
                <div className="flex items-center gap-2">
                  <div className="text-3xl font-bold bg-gradient-to-r from-teal-400 to-pink-400 bg-clip-text text-transparent">
                    Lumel
                  </div>
                  <div className="text-2xl font-light text-gray-600">Decor</div>
                </div>
              </Link>
              <p className="text-gray-600 text-sm mt-4">Transformando momentos especiais em memórias inesquecíveis</p>
            </div>

            {/* Informações */}
            <div>
              <h6 className="font-bold text-gray-800 mb-4">Informações</h6>
              <ul className="space-y-3 text-gray-600 text-sm">
                <li className="flex items-start gap-2">
                  <FontAwesomeIcon icon="map-marker-alt" className="mt-1 text-teal-500 flex-shrink-0" />
                  <div>
                    <p>Rua Úrsula Paulino, 911, Betânia</p>
                    <p>Belo Horizonte - MG</p>
                  </div>
                </li>
                <li className="flex items-start gap-2">
                  <FontAwesomeIcon icon="envelope" className="mt-1 text-pink-500 flex-shrink-0" />
                  <div>
                    <p>contato@lumeldecor.com.br</p>
                    <p>financeiro@lumeldecor.com.br</p>
                  </div>
                </li>
                <li className="flex items-start gap-2">
                  <FontAwesomeIcon icon="phone" className="mt-1 text-teal-500 flex-shrink-0" />
                  <p>31 99514-0615</p>
                </li>
              </ul>
            </div>

            {/* Links Úteis */}
            <div>
              <h6 className="font-bold text-gray-800 mb-4">Links Úteis</h6>
              <ul className="space-y-2 text-gray-600 text-sm">
                <li>
                  <Link href="/sobre" className="hover:text-teal-600 transition">
                    Sobre Nós
                  </Link>
                </li>
                <li>
                  <Link href="/faq" className="hover:text-teal-600 transition">
                    Perguntas Frequentes
                  </Link>
                </li>
                <li>
                  <Link href="/termos" className="hover:text-teal-600 transition">
                    Termos de Uso
                  </Link>
                </li>
                <li>
                  <Link href="/privacidade" className="hover:text-teal-600 transition">
                    Política de Privacidade
                  </Link>
                </li>
                <li>
                  <Link href="/contato" className="hover:text-teal-600 transition">
                    Contato
                  </Link>
                </li>
              </ul>
            </div>

            {/* Minha Conta */}
            <div>
              <h6 className="font-bold text-gray-800 mb-4">Minha Conta</h6>
              <ul className="space-y-2 text-gray-600 text-sm">
                <li>
                  <Link href="/perfil" className="hover:text-teal-600 transition">
                    Meus Dados
                  </Link>
                </li>
                <li>
                  <Link href="/cupons" className="hover:text-teal-600 transition">
                    Meus Cupons
                  </Link>
                </li>
                <li>
                  <Link href="/devolucoes" className="hover:text-teal-600 transition">
                    Devoluções
                  </Link>
                </li>
                <li>
                  <Link href="/pedidos" className="hover:text-teal-600 transition">
                    Histórico de Compras
                  </Link>
                </li>
                <li>
                  <Link href="/rastreamento" className="hover:text-teal-600 transition">
                    Rastreamentos
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      {/* Bottom Footer */}
      <div className="bg-gray-200 py-6">
        <div className="container mx-auto px-4">
          <div className="flex flex-col md:flex-row items-center justify-between gap-4">
            <p className="text-sm text-gray-600 text-center md:text-left">
              © {new Date().getFullYear()} - <span className="font-semibold">Lumel Decor</span> - Todos os direitos
              reservados
            </p>

            {/* Social Icons */}
            <div className="flex gap-4">
              <a
                href="https://www.facebook.com/lumelldecor"
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-600 hover:text-blue-600 transition text-2xl"
                title="Facebook"
              >
                <FontAwesomeIcon icon={['fab', 'facebook']} />
              </a>
              <a
                href="https://www.instagram.com/lumeldecor"
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-600 hover:text-pink-600 transition text-2xl"
                title="Instagram"
              >
                <FontAwesomeIcon icon={['fab', 'instagram']} />
              </a>
              <a
                href="https://wa.me/553195140615"
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-600 hover:text-green-600 transition text-2xl"
                title="WhatsApp"
              >
                <FontAwesomeIcon icon={['fab', 'whatsapp']} />
              </a>
            </div>

            {/* Payment Methods - usando ícones FontAwesome */}
            <div className="flex gap-3 text-2xl text-gray-400">
              <FontAwesomeIcon icon={['fab', 'cc-visa']} title="Visa" />
              <FontAwesomeIcon icon={['fab', 'cc-mastercard']} title="Mastercard" />
              <FontAwesomeIcon icon={['fab', 'cc-paypal']} title="PayPal" />
              <FontAwesomeIcon icon={['fab', 'cc-amex']} title="American Express" />
            </div>
          </div>

          <div className="text-center mt-4 text-sm text-gray-600">
            Site criado por{' '}
            <a
              href="https://www.turnupweb.com"
              target="_blank"
              rel="noopener noreferrer"
              className="font-semibold text-teal-600 hover:text-teal-700 transition"
            >
              TurnUp Web
            </a>
          </div>
        </div>
      </div>
    </>
  );
}
