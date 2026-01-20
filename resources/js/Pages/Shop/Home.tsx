import React, { useState } from 'react';
import { Head, Link } from '@inertiajs/react';
import ShopLayout from '@/Layouts/ShopLayout';
import HeroCarousel from '@/Components/Shop/HeroCarousel';

// Types
interface ProductItem {
  id: number;
  sku: string;
  name: string;
  slug: string;
  price: number;
  compare_price?: number | null;
  discount_percentage?: number | null;
  image?: string;
  category: string;
  color?: string;
  colors?: string[];
}

interface Collection {
  id: number;
  name: string;
  slug: string;
  description?: string;
  image?: string;
}

interface Category {
  id: number;
  name: string;
  slug: string;
}

interface HomeProps {
  launchProducts?: ProductItem[];
  featuredProducts?: ProductItem[];
  bestSellers?: ProductItem[];
  collections?: Collection[];
  categories?: Category[];
}

// Product Card Component
const ProductCard = ({
  product,
  badge,
}: {
  product: ProductItem;
  badge: { icon: JSX.Element; color: string; label: string };
}) => {
  const [imageError, setImageError] = useState(false);

  return (
    <div className="bg-white rounded-lg shadow-sm hover:shadow-xl transition-all group overflow-hidden">
      {/* Badge */}
      <div className="relative">
        <span
          className={`absolute top-3 left-3 ${badge.color} text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg z-10 flex items-center gap-1`}
        >
          {badge.icon}
          {badge.label}
        </span>

        {/* Product Image */}
        <div className="relative overflow-hidden aspect-square bg-gray-100">
          <Link href={`/produtos/${product.slug}`}>
            <img
              src={imageError ? '/images/placeholder-product.jpg' : product.image || '/images/placeholder-product.jpg'}
              alt={product.name}
              onError={() => setImageError(true)}
              className="w-full h-full object-cover group-hover:scale-110 transition duration-700"
            />
          </Link>

          {/* Action Buttons (aparecem no hover) */}
          <div className="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <div className="flex gap-2">
              <button className="bg-white p-3 rounded-full hover:bg-teal-500 hover:text-white transition shadow-lg">
                <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                  />
                </svg>
              </button>
              <button className="bg-white p-3 rounded-full hover:bg-pink-500 hover:text-white transition shadow-lg">
                <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  />
                </svg>
              </button>
              <button className="bg-white p-3 rounded-full hover:bg-teal-500 hover:text-white transition shadow-lg">
                <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      {/* Product Info */}
      <div className="p-5">
        <p className="text-xs text-teal-600 font-semibold mb-1">{product.category}</p>

        <Link href={`/produtos/${product.slug}`}>
          <h6 className="font-semibold text-gray-900 mb-3 line-clamp-2 group-hover:text-teal-600 transition h-12">
            {product.name}
          </h6>
        </Link>

        {/* Price */}
        <div className="mb-3">
          <div className="flex items-center gap-2">
            <span className="text-2xl font-bold bg-gradient-to-r from-teal-600 to-pink-600 bg-clip-text text-transparent">
              R$ {product.price.toFixed(2)}
            </span>
            {product.compare_price && (
              <span className="text-sm text-gray-400 line-through">R$ {product.compare_price.toFixed(2)}</span>
            )}
          </div>
          {product.discount_percentage && (
            <div className="inline-block mt-1">
              <span className="bg-pink-100 text-pink-600 px-2 py-1 rounded text-xs font-semibold">
                {product.discount_percentage}% OFF
              </span>
            </div>
          )}
        </div>

        {/* Colors (se houver) */}
        {product.colors && product.colors.length > 0 && (
          <div className="flex gap-2">
            {product.colors.slice(0, 4).map((color, idx) => (
              <button
                key={idx}
                className="w-6 h-6 rounded-full border-2 border-gray-300 hover:border-teal-500 transition"
                style={{ backgroundColor: color }}
                title={color}
              />
            ))}
          </div>
        )}
      </div>
    </div>
  );
};

// Product Section Component
const ProductSection = ({
  title,
  icon,
  products = [], // valor padrão
  badge,
}: {
  title: string;
  icon: JSX.Element;
  products?: ProductItem[]; // opcional
  badge: { icon: JSX.Element; color: string; label: string };
}) => {
  // Se não houver produtos, não renderiza a seção
  if (!products || products.length === 0) {
    return null;
  }

  return (
    <section className="py-16">
      <div className="container mx-auto px-4">
        {/* Section Header */}
        <div className="mb-8">
          <div className="flex items-center gap-3 mb-2">
            <div className="text-teal-500">{icon}</div>
            <h2 className="text-3xl font-bold text-gray-900">{title}</h2>
          </div>
          <div className="w-24 h-1 bg-gradient-to-r from-teal-400 to-pink-400 rounded-full"></div>
        </div>

        {/* Products Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {products.map((product) => (
            <ProductCard key={product.id} product={product} badge={badge} />
          ))}
        </div>

        {/* Ver Todos */}
        <div className="text-center mt-8">
          <Link
            href="/produtos"
            className="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-pink-500 text-white px-8 py-3 rounded-lg font-semibold hover:from-teal-600 hover:to-pink-600 transition shadow-lg transform hover:scale-105"
          >
            Ver Todos os Produtos
            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </Link>
        </div>
      </div>
    </section>
  );
};

// Main Home Component
export default function Home({
  launchProducts = [],
  featuredProducts = [],
  bestSellers = [],
  collections = [],
  categories = [],
}: HomeProps) {
  return (
    <ShopLayout title="Home - Lumel Decor" categories={categories} collections={collections}>
      <Head title="Home - Lumel Decor" />

      {/* Hero Carousel */}
      <HeroCarousel collections={collections} />

      {/* Lançamentos */}
      <ProductSection
        title="Lançamentos"
        icon={
          <svg className="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
          </svg>
        }
        products={launchProducts}
        badge={{
          icon: (
            <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
          ),
          color: 'bg-gradient-to-r from-purple-500 to-purple-600',
          label: 'Novo',
        }}
      />

      {/* Banner 3 colunas (opcional) */}
      <section className="py-8 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div className="bg-gradient-to-br from-teal-400 to-teal-500 rounded-lg p-8 text-white">
              <h3 className="text-2xl font-bold mb-2">Coleção Festa Junina</h3>
              <p className="mb-4">Arraiá completo para sua festa</p>
              <Link
                href="/colecoes/festa-junina"
                className="inline-block bg-white text-teal-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition"
              >
                Ver Coleção
              </Link>
            </div>
            <div className="bg-gradient-to-br from-purple-400 to-purple-500 rounded-lg p-8 text-white">
              <h3 className="text-2xl font-bold mb-2">Casamentos</h3>
              <p className="mb-4">Elegância para o seu grande dia</p>
              <Link
                href="/colecoes/casamento"
                className="inline-block bg-white text-purple-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition"
              >
                Ver Coleção
              </Link>
            </div>
            <div className="bg-gradient-to-br from-pink-400 to-pink-500 rounded-lg p-8 text-white">
              <h3 className="text-2xl font-bold mb-2">Festas Infantis</h3>
              <p className="mb-4">Magia e diversão garantida</p>
              <Link
                href="/colecoes/festa-infantil"
                className="inline-block bg-white text-pink-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition"
              >
                Ver Coleção
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Destaques */}
      <ProductSection
        title="Destaques"
        icon={
          <svg className="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        }
        products={featuredProducts}
        badge={{
          icon: (
            <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
          ),
          color: 'bg-gradient-to-r from-yellow-400 to-yellow-500',
          label: 'Destaque',
        }}
      />

      {/* Mais Vendidos */}
      <ProductSection
        title="Mais Vendidos"
        icon={
          <svg className="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
            <path
              fillRule="evenodd"
              d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
              clipRule="evenodd"
            />
          </svg>
        }
        products={bestSellers}
        badge={{
          icon: (
            <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path
                fillRule="evenodd"
                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                clipRule="evenodd"
              />
            </svg>
          ),
          color: 'bg-gradient-to-r from-red-500 to-orange-500',
          label: 'Hot',
        }}
      />
    </ShopLayout>
  );
}
