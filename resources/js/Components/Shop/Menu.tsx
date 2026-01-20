import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

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

interface MenuProps {
  categories?: Category[];
  collections?: Collection[];
}

export default function Menu({ categories = [], collections = [] }: MenuProps) {
  const [showCategoriesDropdown, setShowCategoriesDropdown] = useState(false);
  const [showCollectionsDropdown, setShowCollectionsDropdown] = useState(false);

  return (
    <nav className="bg-white shadow-sm border-b border-gray-200">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-14">
          {/* Main Menu */}
          <ul className="flex items-center space-x-8">
            {/* Início */}
            <li>
              <Link
                href="/"
                className="flex items-center gap-2 text-gray-700 hover:text-teal-500 font-medium transition"
              >
                <FontAwesomeIcon icon="home" className="w-4 h-4" />
                Início
              </Link>
            </li>

            {/* Coleções - Dropdown */}
            <li
              className="relative"
              onMouseEnter={() => setShowCollectionsDropdown(true)}
              onMouseLeave={() => setShowCollectionsDropdown(false)}
            >
              <button className="flex items-center gap-2 text-gray-700 hover:text-teal-500 font-medium transition">
                <FontAwesomeIcon icon="layer-group" className="w-4 h-4" />
                Coleções
                <FontAwesomeIcon icon="chevron-down" className="w-3 h-3" />
              </button>

              {/* Dropdown Coleções */}
              {showCollectionsDropdown && collections.length > 0 && (
                <div className="absolute left-0 top-full mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50">
                  {collections.map((collection) => (
                    <Link
                      key={collection.id}
                      href={`/colecoes/${collection.slug}`}
                      className="block px-4 py-2 text-gray-700 hover:bg-teal-50 hover:text-teal-600 transition"
                    >
                      {collection.name}
                    </Link>
                  ))}
                  <div className="border-t border-gray-200 mt-2 pt-2">
                    <Link
                      href="/colecoes"
                      className="flex items-center justify-center gap-2 px-4 py-2 text-teal-600 font-semibold hover:bg-teal-50 transition"
                    >
                      Ver Todas as Coleções
                      <FontAwesomeIcon icon="arrow-right" className="w-3 h-3" />
                    </Link>
                  </div>
                </div>
              )}
            </li>

            {/* Categorias - Mega Dropdown */}
            <li
              className="relative"
              onMouseEnter={() => setShowCategoriesDropdown(true)}
              onMouseLeave={() => setShowCategoriesDropdown(false)}
            >
              <button className="flex items-center gap-2 text-gray-700 hover:text-teal-500 font-medium transition">
                <FontAwesomeIcon icon="th-large" className="w-4 h-4" />
                Categorias
                <FontAwesomeIcon icon="chevron-down" className="w-3 h-3" />
              </button>

              {/* Mega Dropdown Categorias */}
              {showCategoriesDropdown && categories.length > 0 && (
                <div className="absolute left-0 top-full mt-2 w-96 bg-white rounded-lg shadow-xl border border-gray-200 p-4 z-50">
                  <div className="grid grid-cols-2 gap-2">
                    {categories.map((category) => (
                      <Link
                        key={category.id}
                        href={`/categorias/${category.slug}`}
                        className="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-teal-50 hover:text-teal-600 rounded-lg transition"
                      >
                        <FontAwesomeIcon icon="th-large" className="text-teal-500" />
                        <span>{category.name}</span>
                      </Link>
                    ))}
                  </div>
                  <div className="border-t border-gray-200 mt-3 pt-3">
                    <Link
                      href="/categorias"
                      className="flex items-center justify-center gap-2 text-teal-600 font-semibold hover:text-teal-700 transition"
                    >
                      Ver Todas as Categorias
                      <FontAwesomeIcon icon="arrow-right" className="w-3 h-3" />
                    </Link>
                  </div>
                </div>
              )}
            </li>

            {/* Kits */}
            <li>
              <Link
                href="/kits"
                className="flex items-center gap-2 text-gray-700 hover:text-teal-500 font-medium transition"
              >
                <FontAwesomeIcon icon="gift" className="w-4 h-4" />
                Kits
              </Link>
            </li>

            {/* Lançamentos */}
            <li>
              <Link
                href="/lancamentos"
                className="flex items-center gap-2 text-gray-700 hover:text-teal-500 font-medium transition"
              >
                <FontAwesomeIcon icon="rocket" className="w-4 h-4" />
                Lançamentos
              </Link>
            </li>

            {/* Ofertas */}
            <li>
              <Link
                href="/ofertas"
                className="flex items-center gap-2 text-pink-600 hover:text-pink-700 font-bold transition"
              >
                <FontAwesomeIcon icon="fire" className="w-4 h-4" />
                Ofertas
                <span className="bg-pink-600 text-white text-xs px-2 py-0.5 rounded-full font-bold">HOT</span>
              </Link>
            </li>
          </ul>

          {/* Right Side - Telefone */}
          <div className="hidden lg:flex items-center gap-2 text-gray-600">
            <FontAwesomeIcon icon="phone" className="text-teal-500" />
            <span className="text-sm font-semibold">Dúvidas? 31 99514-0615</span>
          </div>
        </div>
      </div>
    </nav>
  );
}
