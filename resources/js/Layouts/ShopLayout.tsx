import React, { ReactNode } from 'react';
import { Head } from '@inertiajs/react';
import Header from '@/Components/Shop/Header';
import Menu from '@/Components/Shop/Menu';
import Footer from '@/Components/Shop/Footer';

interface Category {
  id: number;
  name: string;
  slug: string;
}

interface Collection {
  id: number;
  name: string;
  slug: string;
}

interface ShopLayoutProps {
  children: ReactNode;
  title?: string;
  showShopInfo?: boolean;
  categories?: Category[];
  collections?: Collection[];
}

// Shop Info Cards
const ShopInfo = () => {
  const features = [
    {
      icon: (
        <svg className="w-10 h-10 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
          <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
          <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
        </svg>
      ),
      title: 'Frete Grátis',
      description: 'Para compras acima de R$ 299',
    },
    {
      icon: (
        <svg className="w-10 h-10 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
          <path
            fillRule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
            clipRule="evenodd"
          />
        </svg>
      ),
      title: 'Pagamento Seguro',
      description: 'Ambiente 100% protegido',
    },
    {
      icon: (
        <svg className="w-10 h-10 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
          <path
            fillRule="evenodd"
            d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
            clipRule="evenodd"
          />
        </svg>
      ),
      title: 'Devolução Grátis',
      description: '30 dias para devolver',
    },
    {
      icon: (
        <svg className="w-10 h-10 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
          <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
        </svg>
      ),
      title: 'Ganhe Cashback',
      description: 'Em todas as compras',
    },
  ];

  return (
    <div className="bg-gradient-to-r from-teal-50 to-pink-50 py-8">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
          {features.map((feature, index) => (
            <div
              key={index}
              className="flex items-center gap-4 bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition"
            >
              <div>{feature.icon}</div>
              <div>
                <h4 className="font-bold text-gray-800">{feature.title}</h4>
                <p className="text-sm text-gray-600">{feature.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

// Newsletter
const Newsletter = () => {
  return (
    <div className="bg-gradient-to-r from-teal-600 to-pink-600 py-12">
      <div className="container mx-auto px-4">
        <div className="max-w-4xl mx-auto text-center text-white">
          <h3 className="text-3xl font-bold mb-3">Receba Nossas Ofertas</h3>
          <p className="mb-6 text-teal-50">Cadastre-se e ganhe 10% de desconto na primeira compra</p>
          <div className="flex gap-3 max-w-md mx-auto">
            <input
              type="email"
              placeholder="Seu melhor e-mail"
              className="flex-1 px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-white"
            />
            <button className="bg-white text-teal-600 px-6 py-3 rounded-lg font-bold hover:bg-teal-50 transition">
              Cadastrar
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

// Main Layout Component
export default function ShopLayout({
  children,
  title = 'Lumel Decor',
  showShopInfo = true,
  categories = [],
  collections = [],
}: ShopLayoutProps) {
  return (
    <>
      <Head title={title} />

      <div className="min-h-screen flex flex-col bg-gray-50">
        {/* Header */}
        <Header />

        {/* Menu */}
        <Menu categories={categories} collections={collections} />

        {/* Main Content */}
        <main className="flex-1">
          {children}
          {showShopInfo && <ShopInfo />}
          <Newsletter />
        </main>

        {/* Footer */}
        <Footer />

        {/* Scroll to Top Button */}
        <button
          onClick={() => window.scrollTo({ top: 0, behavior: 'smooth' })}
          className="fixed bottom-8 right-8 bg-gradient-to-r from-teal-500 to-pink-500 text-white p-3 rounded-full shadow-lg hover:from-teal-600 hover:to-pink-600 transition transform hover:scale-110 z-50"
        >
          <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 10l7-7m0 0l7 7m-7-7v18" />
          </svg>
        </button>
      </div>
    </>
  );
}
