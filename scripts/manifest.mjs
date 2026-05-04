import { readdirSync, statSync, writeFileSync } from 'node:fs';
import { join } from 'node:path';

const distDir = new URL('../ui/assets/dist/', import.meta.url).pathname;
const manifest = {};

for (const entry of readdirSync(distDir)) {
  if (entry === 'manifest.json') continue;
  const full = join(distDir, entry);
  if (!statSync(full).isFile()) continue;
  // Identity manifest until we add content hashing. Cache busting is still
  // handled at request time via ?v=YOURLS_VERSION (see Asset::url()).
  manifest[entry] = entry;
}

writeFileSync(join(distDir, 'manifest.json'), JSON.stringify(manifest, null, 2) + '\n');
console.log('manifest.json generated for', Object.keys(manifest).length, 'asset(s).');
