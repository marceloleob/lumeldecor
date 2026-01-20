import { Link } from '@inertiajs/react';

interface CollectionCardProps {
  collection: {
    id: number;
    name: string;
    slug: string;
    description?: string;
    image?: string;
  };
}

export default function CollectionCard({ collection }: CollectionCardProps) {
  return (
    <Link
      href={`/colecoes/${collection.slug}`}
      className="group relative h-96 overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300"
    >
      {/* Imagem de fundo */}
      <div className="absolute inset-0 bg-gradient-to-br from-primary-400 to-secondary-400">
        {collection.image && (
          <img
            src={collection.image}
            alt={collection.name}
            className="w-full h-full object-cover opacity-80 group-hover:scale-110 transition-transform duration-500"
          />
        )}
      </div>

      {/* Overlay */}
      <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent" />

      {/* Conteúdo */}
      <div className="absolute inset-0 flex flex-col justify-end p-8 text-white">
        <h3 className="text-3xl font-bold mb-2 group-hover:translate-y-[-4px] transition-transform">
          {collection.name}
        </h3>

        {collection.description && <p className="text-white/90 line-clamp-2 mb-4">{collection.description}</p>}

        <span className="inline-flex items-center text-sm font-semibold group-hover:gap-2 transition-all">
          Ver coleção
          <svg
            className="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </span>
      </div>
    </Link>
  );
}
