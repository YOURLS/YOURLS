/**
 * Enforce Issue Template review
 */
on('issues.opened')
  .filter(context => !context.payload.issue.body.match(/### Reproducible bug summary/)
       || context.payload.issue.body.includes('- [ ]'))
  .comment(contents('.github/MISSING_ISSUE_TEMPLATE_AUTOREPLY.md'))
  .label('insufficient-info');

/**
 * Minimize comment length
 */
on('issue_comment.created')
  .filter(context => context.payload.comment.body
    .trim()
    .replace(/\s+/gi, ' ')
    .split(' ')
    .length > 200
  )
  .comment(`
Thanks for your comment, @{{ sender.login }}!

Your reply is very long.
As a bot, I take less than a second to read it, but summing it up a little bit
will help old-fashioned humans understand your thought.
  `);
