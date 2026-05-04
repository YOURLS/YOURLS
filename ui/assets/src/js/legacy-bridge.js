/**
 * Legacy global namespace for plugins still using window.yourls.* helpers.
 * Add new plumbing here as the migration progresses; remove obsolete entries
 * with a deprecation cycle when no plugin in the curated smoke-test fixture
 * relies on them anymore.
 */
window.yourls = window.yourls || {};
