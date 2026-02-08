document.addEventListener('DOMContentLoaded', () => {
    // 1. Sports Tab Switching
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.dataset.tab;

            // Update active button
            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.style.display = 'none';
                content.classList.remove('active');
            });

            // Show selected tab content
            const activeContent = document.getElementById(`${targetTab}-content`);
            if (activeContent) {
                activeContent.style.display = 'block';
                activeContent.classList.add('active');
            }
        });
    });

    // 2. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            alert('Mobile Menu clicked! In a full implementation, this would open a sidebar menu.');
        });
    }

    // 3. Image Hover Feedback (already in CSS, but adding JS console confirmation for "every button work" intent)
    const allLinks = document.querySelectorAll('a, button');
    allLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (link.getAttribute('href') === '#') {
                e.preventDefault();
                console.log('Clicked a placeholder link.');
            }
        });
    });
    // 4. Search and Highlight Functionality
    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');

    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', () => {
            const searchTerm = searchInput.value.trim();
            if (!searchTerm) return;

            // Clear previous highlights
            clearHighlights(document.body);

            // Highlight new terms
            highlightText(document.body, searchTerm);
        });

        // Allow pressing Enter to search
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });
    }

    function highlightText(element, term) {
        if (!term) return;
        const regex = new RegExp(`(${term})`, 'gi');

        // Walk through all child nodes
        const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);
        const nodes = [];
        let currentNode;

        while (currentNode = walker.nextNode()) {
            // Avoid highlighting inside scripts, styles, or the search input itself
            const parent = currentNode.parentElement;
            if (parent &&
                parent.tagName !== 'SCRIPT' &&
                parent.tagName !== 'STYLE' &&
                parent.id !== 'searchInput' &&
                !parent.classList.contains('search-highlight')) {
                nodes.push(currentNode);
            }
        }

        nodes.forEach(node => {
            const matches = node.nodeValue.match(regex);
            if (matches) {
                const span = document.createElement('span');
                span.innerHTML = node.nodeValue.replace(regex, '<span class="search-highlight">$1</span>');
                node.parentNode.replaceChild(span, node);
            }
        });
    }

    function clearHighlights(element) {
        const highlights = element.querySelectorAll('.search-highlight');
        highlights.forEach(highlight => {
            const parent = highlight.parentNode;
            parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
            parent.normalize(); // Merges adjacent text nodes
        });
    }
});
